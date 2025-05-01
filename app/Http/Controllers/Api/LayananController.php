<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\LayananRequest;
use App\Models\Layanan;
use App\Repositories\LayananRepository;
use App\Repositories\NotificationRepository;
use Illuminate\Http\JsonResponse;
use App\Services\EmailService;
use App\Services\FileService;

class LayananController extends Controller
{
    /**
     * layananRepository
     *
     * @var LayananRepository
     */
    private LayananRepository $layananRepository;

    /**
     * NotificationRepository
     *
     * @var NotificationRepository
     */
    private NotificationRepository $NotificationRepository;

    /**
     * file service
     *
     * @var FileService
     */
    private FileService $fileService;

    /**
     * email service
     *
     * @var FileService
     */
    private EmailService $emailService;

    /**
     * constructor method
     *
     * @return void
     */
    public function __construct()
    {
        $this->layananRepository      = new LayananRepository;
        $this->fileService            = new FileService;
        $this->emailService           = new EmailService;
        $this->NotificationRepository = new NotificationRepository;

        $this->middleware('can:layanan');
        $this->middleware('can:layanan Tambah')->only(['create', 'store']);
        $this->middleware('can:layanan Ubah')->only(['edit', 'update']);
        $this->middleware('can:layanan Hapus')->only(['destroy']);
    }

    /**
     * get data as pagination
     *
     * @return JsonResponse
     */
    public function index()
    {
        $data = $this->layananRepository->getPaginate();
        $successMessage = successMessageLoadData("layanan");
        return response200($data, $successMessage);
    }

    /**
     * get detail data
     *
     * @param Layanan $layanan
     * @return JsonResponse
     */
    public function show(Layanan $layanan)
    {
        $successMessage = successMessageLoadData("layanan");
        return response200($layanan, $successMessage);
    }

    /**
     * save new data to db
     *
     * @param LayananRequest $request
     * @return JsonResponse
     */
    public function store(LayananRequest $request)
    {
        $data = $request->only([
			'nama',
        ]);

        // bisa digunakan jika ada upload file dan ganti methodnya
        // if ($request->hasFile('file')) {
        //     $data['file'] = $this->fileService->uploadCrudExampleFile($request->file('file'));
        // }

        // use this if you want to create notification data
        // $title = 'Notify Title';
        // $content = 'lorem ipsum dolor sit amet';
        // $userId = 2;
        // $notificationType = 'transaksi masuk';
        // $icon = 'bell'; // font awesome
        // $bgColor = 'primary'; // primary, danger, success, warning
        // $this->NotificationRepository->createNotif($title,  $content, $userId,  $notificationType, $icon, $bgColor);

        // bisa digunakan jika ingim kirim email dan ganti methodnya
        // $this->emailService->methodName($params);

        $result = $this->layananRepository->create($data);
        logCreate('layanan', $result);

        $successMessage = successMessageCreate("layanan");
        return response200($result, $successMessage);
    }

    /**
     * update data to db
     *
     * @param LayananRequest $request
     * @param Layanan $layanan
     * @return JsonResponse
     */
    public function update(LayananRequest $request, Layanan $layanan)
    {
        $data = $request->only([
			'nama',
        ]);

        // bisa digunakan jika ada upload file dan ganti methodnya
        // if ($request->hasFile('file')) {
        //     $data['file'] = $this->fileService->uploadCrudExampleFile($request->file('file'));
        // }

        $result = $this->layananRepository->update($data, $layanan->id);

        // use this if you want to create notification data
        // $title = 'Notify Title';
        // $content = 'lorem ipsum dolor sit amet';
        // $userId = 2;
        // $notificationType = 'transaksi masuk';
        // $icon = 'bell'; // font awesome
        // $bgColor = 'primary'; // primary, danger, success, warning
        // $this->NotificationRepository->createNotif($title,  $content, $userId,  $notificationType, $icon, $bgColor);

        // bisa digunakan jika ingim kirim email dan ganti methodnya
        // $this->emailService->methodName($params);

        logUpdate('layanan', $layanan, $result);

        $successMessage = successMessageUpdate("layanan");
        return response200($result, $successMessage);
    }

    /**
     * delete data from db
     *
     * @param Layanan $layanan
     * @return JsonResponse
     */
    public function destroy(Layanan $layanan)
    {
        $deletedRow = $this->layananRepository->delete($layanan->id);

        // use this if you want to create notification data
        // $title = 'Notify Title';
        // $content = 'lorem ipsum dolor sit amet';
        // $userId = 2;
        // $notificationType = 'transaksi masuk';
        // $icon = 'bell'; // font awesome
        // $bgColor = 'primary'; // primary, danger, success, warning
        // $this->NotificationRepository->createNotif($title,  $content, $userId,  $notificationType, $icon, $bgColor);

        // bisa digunakan jika ingim kirim email dan ganti methodnya
        // $this->emailService->methodName($params);

        logDelete('layanan', $layanan);

        $successMessage = successMessageDelete("layanan");
        return response200($deletedRow, $successMessage);
    }
}
