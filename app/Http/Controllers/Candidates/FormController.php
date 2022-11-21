<?php

namespace App\Http\Controllers\Candidates;

use App\Http\Controllers\AppBaseController;
use App\Http\Controllers\Controller;
use App\Models\Anak;
use App\Models\Darurat;
use App\Models\DataDiri;
use App\Models\Keluarga;
use App\Models\Pekerjaan;
use App\Models\Pendidikan;
use App\Models\PendidikanNon;
use App\Models\Referensi;
use Illuminate\Http\Request;
use Laracasts\Flash\Flash;

class FormController extends AppBaseController
{
    //

    public function simpan(Request $request)
    {
        $matchThese = ['userid' => $request->id_user];

        $request['alamat_domisili'] = $request->alamat_dom . "^" . $request->rt_dom . "^" . $request->rw_dom . "^" . $request->kelurahan_dom . "^" . $request->kecamatan_dom . "^" . $request->kota_dom . "^" . $request->pos_dom;
        $request['alamat_ktp'] = $request->alamat_ktp . "^" . $request->rt_ktp . "^" . $request->rw_ktp . "^" . $request->kelurahan_ktp . "^" . $request->kecamatan_ktp . "^" . $request->kota_ktp . "^" . $request->pos_ktp;

        DataDiri::updateOrCreate($matchThese, $request->all());
        Flash::success('Form Berhasil Diupdate');
        return redirect()->back();
    }


    public function savePendidikan(Request $request)
    {
        $matchThese = ['userid' => $request->userid, 'tingkat' => $request->tingkat];
        Pendidikan::updateOrCreate($matchThese, $request->all());
        Flash::success('Form Berhasil Diupdate');
        return redirect()->back();
    }

    public function savePendidikanNon(Request $request)
    {
        PendidikanNon::Create($request->all());
        Flash::success('Form Berhasil Diupdate');
        return redirect()->back();
    }

    public function savePekerjaan(Request $request)
    {
        Pekerjaan::Create($request->all());
        Flash::success('Form Berhasil Diupdate');
        return redirect()->back();
    }

    public function saveAnak(Request $request)
    {
        Anak::Create($request->all());
        Flash::success('Form Berhasil Diupdate');
        return redirect()->back();
    }

    public function saveKeluarga(Request $request)
    {
        Keluarga::Create($request->all());
        Flash::success('Form Berhasil Diupdate');
        return redirect()->back();
    }


    public function saveReferensi(Request $request)
    {
        Referensi::Create($request->all());
        Flash::success('Form Berhasil Diupdate');
        return redirect()->back();
    }

    public function saveDarurat(Request $request)
    {
        Darurat::Create($request->all());
        Flash::success('Form Berhasil Diupdate');
        return redirect()->back();
    }

    public function destroyPendidikan(Request $request)
    {
        $data = PendidikanNon::find($request->idpend);
        $data->delete();
        Flash::success('Data Berhasil Dihapus');
        return redirect()->back();
    }
}
