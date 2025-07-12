<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateGaleriRequest;
use App\Http\Requests\UpdateGaleriRequest;
use App\Http\Controllers\AppBaseController;
use App\Repositories\GaleriRepository;
use Illuminate\Http\Request;
use Flash;

class GaleriController extends AppBaseController
{
    /** @var GaleriRepository $galeriRepository*/
    private $galeriRepository;

    public function __construct(GaleriRepository $galeriRepo)
    {
        $this->middleware('permission:galeris.index', ['only' => ['index','show']]);
        $this->middleware('permission:galeris.create', ['only' => ['create','store']]);
        $this->middleware('permission:galeris.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:galeris.destroy', ['only' => ['destroy']]);
        $this->galeriRepository = $galeriRepo;
    }

    /**
     * Display a listing of the Galeri.
     */
    public function index(Request $request)
    {
        $galeris = $this->galeriRepository->paginate(10);

        return view('galeris.index')
            ->with('galeris', $galeris);
    }

    /**
     * Show the form for creating a new Galeri.
     */
    public function create()
    {
        return view('galeris.create');
    }

    /**
     * Store a newly created Galeri in storage.
     */
    public function store(CreateGaleriRequest $request)
    {
        $input = $request->all();

        $galeri = $this->galeriRepository->create($input);
        $galeri->addFromMediaLibraryRequest($request->media)
            ->toMediaCollection();

        Flash::success('Galeri saved successfully.');

        return redirect(route('galeris.index'));
    }

    /**
     * Display the specified Galeri.
     */
    public function show($id)
    {
        $galeri = $this->galeriRepository->find($id);

        if (empty($galeri)) {
            Flash::error('Galeri not found');

            return redirect(route('galeris.index'));
        }

        return view('galeris.show')->with('galeri', $galeri);
    }

    /**
     * Show the form for editing the specified Galeri.
     */
    public function edit($id)
    {
        $galeri = $this->galeriRepository->find($id);

        if (empty($galeri)) {
            Flash::error('Galeri not found');

            return redirect(route('galeris.index'));
        }

        return view('galeris.edit')->with('galeri', $galeri);
    }

    /**
     * Update the specified Galeri in storage.
     */
    public function update($id, UpdateGaleriRequest $request)
    {
        $galeri = $this->galeriRepository->find($id);

        if (empty($galeri)) {
            Flash::error('Galeri not found');

            return redirect(route('galeris.index'));
        }

        $galeri = $this->galeriRepository->update($request->all(), $id);
        $galeri->syncFromMediaLibraryRequest($request->media)
            ->toMediaCollection();

        Flash::success('Galeri updated successfully.');

        return redirect(route('galeris.index'));
    }

    /**
     * Remove the specified Galeri from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $galeri = $this->galeriRepository->find($id);

        if (empty($galeri)) {
            Flash::error('Galeri not found');

            return redirect(route('galeris.index'));
        }

        $this->galeriRepository->delete($id);

        Flash::success('Galeri deleted successfully.');

        return redirect(route('galeris.index'));
    }
}
