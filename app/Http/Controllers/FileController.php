<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Http\Controllers\AppBaseController;
use App\Models\FileCategory;
use App\Repositories\FileRepository;
use Illuminate\Http\Request;
use Flash;

class FileController extends AppBaseController
{
    /** @var FileRepository $fileRepository*/
    private $fileRepository;

    public function __construct(FileRepository $fileRepo)
    {
        $this->middleware('permission:files.index', ['only' => ['index','show']]);
        $this->middleware('permission:files.create', ['only' => ['create','store']]);
        $this->middleware('permission:files.edit', ['only' => ['edit','update']]);
        $this->middleware('permission:files.destroy', ['only' => ['destroy']]);
        $this->fileRepository = $fileRepo;
    }

    /**
     * Display a listing of the File.
     */
    public function index(Request $request)
    {
        $files = $this->fileRepository->paginate(10);

        return view('files.index')
            ->with('files', $files);
    }

    /**
     * Show the form for creating a new File.
     */
    public function create()
    {
        $fileCategory = FileCategory::pluck('name_id','id');

        return view('files.create',compact('fileCategory'));
    }

    /**
     * Store a newly created File in storage.
     */
    public function store(CreateFileRequest $request)
    {
        $request->validate(['media'=>'required']);
        $input = $request->all();

        $file = $this->fileRepository->create($input);
        if(isset($request->media)){
            $file->addFromMediaLibraryRequest($request->media)->toMediaCollection();
        }

        Flash::success('File saved successfully.');

        return redirect(route('files.index'));
    }

    /**
     * Display the specified File.
     */
    public function show($id)
    {
        $file = $this->fileRepository->find($id);

        if (empty($file)) {
            Flash::error('File not found');

            return redirect(route('files.index'));
        }

        return view('files.show')->with('file', $file);
    }

    /**
     * Show the form for editing the specified File.
     */
    public function edit($id)
    {
        $file = $this->fileRepository->find($id);

        if (empty($file)) {
            Flash::error('File not found');

            return redirect(route('files.index'));
        }
        $fileCategory = FileCategory::pluck('name_id','id');

        return view('files.edit',compact('fileCategory'))->with('file', $file);
    }

    /**
     * Update the specified File in storage.
     */
    public function update($id, UpdateFileRequest $request)
    {
        $file = $this->fileRepository->find($id);

        if (empty($file)) {
            Flash::error('File not found');

            return redirect(route('files.index'));
        }
        $request->validate(['media'=>'required']);

        $file = $this->fileRepository->update($request->all(), $id);
        if(isset($request->media)){
            $file->syncFromMediaLibraryRequest($request->media)->toMediaCollection();
        }

        Flash::success('File updated successfully.');

        return redirect(route('files.index'));
    }

    /**
     * Remove the specified File from storage.
     *
     * @throws \Exception
     */
    public function destroy($id)
    {
        $file = $this->fileRepository->find($id);

        if (empty($file)) {
            Flash::error('File not found');

            return redirect(route('files.index'));
        }

        $this->fileRepository->delete($id);

        Flash::success('File deleted successfully.');

        return redirect(route('files.index'));
    }
}
