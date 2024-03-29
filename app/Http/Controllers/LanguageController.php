<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateLanguageRequest;
use App\Http\Requests\UpdateLanguageRequest;
use App\Models\Language;
use App\Repositories\LanguageRepository;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class LanguageController extends AppBaseController
{
    /** @var LanguageRepository */
    private $languageRepository;

    public function __construct(LanguageRepository $languageRepo)
    {
        $this->languageRepository = $languageRepo;
    }

    /**
     * Display a listing of the resource.
     *
     * @param  Request  $request
     *
     * @throws \Exception
     *
     * @return Factory|View
     */
    public function index()
    {
        return view('languages.index');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  CreateLanguageRequest  $request
     *
     * @return JsonResponse
     */
    public function store(CreateLanguageRequest $request): JsonResponse
    {
        $input = $request->all();
        $language = $this->languageRepository->create($input);

        return $this->sendResponse($language, __('messages.flash.language_save'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Language  $language
     *
     * @return JsonResponse
     */
    public function edit(Language $language)
    {
        return $this->sendResponse($language, 'Language Retrieved Successfully.');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  Language  $language
     *
     * @return JsonResponse
     */
    public function show(Language $language)
    {
        return $this->sendResponse($language, __('messages.flash.language_retrieve'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  UpdateLanguageRequest  $request
     * @param  Language  $language
     *
     * @return JsonResponse
     */
    public function update(UpdateLanguageRequest $request, Language $language)
    {
        
        $input = $request->all();
        $this->languageRepository->update($input, $language->id);

        return $this->sendSuccess( __('messages.flash.language_update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Language  $language
     *
     * @throws \Exception
     *
     * @return JsonResponse
     */
    public function destroy(Language $language)
    {
        $languageIds = $language->candidate()->pluck('language_id')->toArray();
        if (in_array($language->id, $languageIds)) {
            return $this->sendError('Language can\'t be deleted.');
        } else {
            $language->delete();
        }

        return $this->sendSuccess( __('messages.flash.language_delete'));
    }
}
