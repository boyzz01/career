<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Models\Company;
use App\Models\Country;
use App\Models\FeaturedRecord;
use App\Models\FrontSetting;
use App\Models\Notification;
use App\Models\NotificationSetting;
use App\Models\ReportedToCompany;
use App\Models\State;
use App\Models\Transaction;
use App\Repositories\CompanyRepository;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use Laracasts\Flash\Flash;
use Throwable;

class CompanyController extends AppBaseController
{
    /** @var CompanyRepository */
    private $companyRepository;

    public function __construct(CompanyRepository $companyRepo)
    {
        $this->companyRepository = $companyRepo;
    }

    /**
     * Display a listing of the Company.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('companies.index');
    }

    /**
     * Show the form for creating a new Company.
     *
     * @return Factory|View
     */
    public function create()
    {
        $data = $this->companyRepository->prepareData();
        $countries = Country::pluck('name', 'id');
        $states = State::toBase()->pluck('name', 'id');

        return view('companies.create', compact('countries', 'states'))->with('data', $data);
    }

    /**
     * Store a newly created Company in storage.
     *
     * @param  CreateCompanyRequest  $request
     *
     * @throws \Throwable
     * @return RedirectResponse|Redirector
     */
    public function store(CreateCompanyRequest $request)
    {
        $input = $request->all();
        $input['is_active'] = (isset($input['is_active'])) ? 1 : 0;

        $company = $this->companyRepository->store($input);

        Flash::success(__('messages.flash.company_save'));

        return redirect(route('company.index'));
    }

    /**
     * Display the specified Company.
     *
     * @param  Company  $company
     *
     * @return Factory|View
     */
    public function show(Company $company)
    {
        return view('companies.show')->with('company', $company);
    }

    /**
     * Show the form for editing the specified Company.
     *
     * @param  Company  $company
     *
     * @return Factory|View
     */
    public function edit(Company $company)
    {
        $user = $company->user;
        $user->phone = preparePhoneNumber($user->phone, $user->region_code);
        $data = $this->companyRepository->prepareData();
        $countries = Country::pluck('name', 'id');
        $states = State::toBase()->pluck('name', 'id');
        $state = $cities = null;
        if (isset($user->country_id)) {
            $state = getStates($user->country_id);
        }
        if (isset($user->state_id)) {
            $cities = getCities($user->state_id);
        }

        return view('companies.edit', compact('data', 'company', 'cities', 'state', 'user', 'countries', 'states'));
    }

    /**
     * @param  Company  $company
     * @param  UpdateCompanyRequest  $request
     *
     * @throws Throwable
     *
     * @return RedirectResponse|Redirector
     */
    public function update(Company $company, UpdateCompanyRequest $request)
    {
        $input = $request->all();
        $input['is_active'] = (isset($input['is_active'])) ? 1 : 0;

        $company = $this->companyRepository->update($input, $company);
        
        Flash::success(__('messages.flash.company_update'));
        
        return redirect(route('company.index'));

    }

    /**
     * Remove the specified Company from storage.
     *
     * @param  Company  $company
     *
     * @throws Exception
     *
     * @return RedirectResponse|Redirector
     */
    public function destroy(Company $company)
    {
        $this->companyRepository->delete($company->id);
        $company->user->media()->delete();
        $company->user->delete();

        return $this->sendSuccess(__('messages.flash.company_delete'));
    }

    /**
     * @param  Company  $company
     *
     * @return mixed
     */
    public function changeIsActive(Company $company)
    {
        $isActive = $company->user->is_active;
        $company->user->update(['is_active' => ! $isActive]);

        return $this->sendSuccess(__('messages.flash.status_change'));
    }

    /**
     * @param  Request  $request
     *
     * @return mixed
     */
    public function getStates(Request $request)
    {
        $postal = $request->get('postal');

        $states = getStates($postal);

        return $this->sendResponse($states, __('messages.flash.retrieved'));
    }

    /**
     * @param  Request  $request
     *
     * @return mixed
     */
    public function getCities(Request $request)
    {
        $state = $request->get('state');
        $cities = getCities($state);

        return $this->sendResponse($cities, __('messages.flash.retrieved'));
    }

    /**
     * Show the form for editing the specified Company.
     *
     * @param  Company  $company
     *
     * @return Factory|View
     */
    public function editCompany(Company $company)
    {
        $user = $company->user;
        $user->phone = preparePhoneNumber($user->phone, $user->region_code);
        if ($user->id != getLoggedInUserId()) {
            throw new ModelNotFoundException;
        }
        $data = $this->companyRepository->prepareData();
        $states = $cities = null;
        if (isset($user->country_id)) {
            $states = getStates($user->country_id);
        }
        if (isset($user->state_id)) {
            $cities = getCities($user->state_id);
        }
        $isFeaturedEnable = FrontSetting::where('key', 'featured_companies_enable')->first()->value;
        $maxFeaturedJob = FrontSetting::where('key', 'featured_companies_quota')->first()->value;
        $totalFeaturedJob = Company::Has('activeFeatured')->count();
        $isFeaturedAvilabal = ($totalFeaturedJob >= $maxFeaturedJob) ? false : true;

        return view('employer.companies.edit',
            compact('data', 'company', 'cities', 'states', 'user', 'isFeaturedEnable', 'isFeaturedAvilabal'));
    }

    /**
     * Update the specified Company in storage.
     *
     * @param  Company  $company
     * @param  UpdateCompanyRequest  $request
     *
     * @return RedirectResponse|Redirector
     */
    public function updateCompany(Company $company, UpdateCompanyRequest $request)
    {
        $input = $request->all();

        $company = $this->companyRepository->update($input, $company);
        
        Flash::success(__('messages.flash.employer_update'));

        return redirect(route('company.edit.form', Auth::user()->owner_id));
    }

    /**
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Application|Factory|View
     */
    public function showReportedCompanies()
    {
        return view('employer.companies.reported_companies');
    }

    /**
     * @param  ReportedToCompany  $reportedToCompany
     *
     * @throws Exception
     *
     * @return mixed
     */
    public function deleteReportedCompany(ReportedToCompany $reportedToCompany)
    {
        $reportedToCompany->delete();

        return $this->sendSuccess(__('messages.flash.reported_job_delete'));
    }

    /**
     * Display a listing of the Job.
     *
     * @param  Request  $request
     *
     * @throws Exception
     *
     * @return Factory|View
     */
    public function getFollowers()
    {
        return view('employer.followers.index');
    }

    /**
     * @param  ReportedToCompany  $reportedToCompany
     *
     * @return mixed
     */
    public function showReportedCompanyNote(Request $request)
    {
        $data = $this->companyRepository->getReportedToCompany($request->reportedToCompany);
        $data['date'] = \Carbon\Carbon::parse($data->created_at)->formatLocalized('%d %b, %Y');

        return $this->sendResponse($data, __('messages.flash.retrieved'));
    }

    /**
     * @param  $companyId
     *
     * @return mixed
     **/
    public function markAsFeatured($companyId)
    {
        $user = getLoggedInUser();
        $addDays = FrontSetting::where('key', 'featured_companies_days')->first()->value;
        $price = FrontSetting::where('key', 'featured_companies_price')->first()->value;
        $maxFeaturedJob = FrontSetting::where('key', 'featured_companies_quota')->first()->value;
        $totalFeaturedJob = Company::Has('activeFeatured')->count();
        $isFeaturedAvailable = ($totalFeaturedJob >= $maxFeaturedJob) ? false : true;
        $company = Company::with('user')->findOrFail($companyId);

        if ($isFeaturedAvailable) {
            $featuredRecord = [
                'owner_id'   => $companyId,
                'owner_type' => Company::class,
                'user_id'    => $user->id,
                'start_time' => Carbon::now(),
                'end_time'   => Carbon::now()->addDays($addDays),
            ];
            FeaturedRecord::create($featuredRecord);
            $notificationStatus = NotificationSetting::where('key', '=', 'MARK_COMPANY_FEATURED')->pluck('value',
                'key')->toArray();
            if ($notificationStatus['MARK_COMPANY_FEATURED'] == Company::ISACTIVE) {
                NotificationSetting::where('key', 'MARK_COMPANY_FEATURED')->where('type',
                    'employer')->first()->value == 1 ?
                    addNotification([
                        Notification::MARK_COMPANY_FEATURED_ADMIN,
                        $company->user->id,
                        Notification::EMPLOYER,
                        $user->first_name.' '.$user->last_name.' mark Company as Featured.',
                    ]) : false;
            }
            $transaction = [
                'owner_id'   => $companyId,
                'owner_type' => Company::class,
                'user_id'    => $user->id,
                'amount'     => $price,
            ];
            Transaction::create($transaction);

            return $this->sendSuccess(__('messages.flash.company_mark_feature'));
        }

        return $this->sendError(__('messages.flash.feature_quota'));
    }

    /**
     * @param  $companyId
     *
     * @return mixed
     **/
    public function markAsUnFeatured($companyId)
    {
        /** @var FeaturedRecord $unFeatured */
        $unFeatured = FeaturedRecord::where('owner_id', $companyId)->where('owner_type', Company::class)->first();
        $unFeatured->delete();

        return $this->sendSuccess(__('messages.flash.company_mark_unFeature'));
    }

    /**
     * @param  Company  $company
     *
     * @return mixed
     */
    public function changeIsEmailVerified(Company $company)
    {
        $company->user->update(['email_verified_at' => Carbon::now()]);

        return $this->sendSuccess(__('messages.flash.email_verify'));
    }

    /**
     * @param  Company  $company
     *
     * @return mixed
     */
    public function resendEmailVerification(Company $company)
    {
        $company->user->sendEmailVerificationNotification();

        return $this->sendSuccess(__('messages.flash.verification_mail'));
    }
}
