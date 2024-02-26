<?php declare(strict_types=1);

namespace App\Http\Controllers;

use App\Http\Requests\StoreRequest;
use App\Services\FeedbackService;

class FeedbackController extends Controller
{
    public function store(StoreRequest $request, FeedbackService $feedbackService): void
    {
        $feedbackService->processFeedback($request);
    }
}
