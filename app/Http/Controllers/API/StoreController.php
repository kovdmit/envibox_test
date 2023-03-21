<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\Contact\StoreRequest;
use App\Models\Contact;
use App\Utils\SaveToFile;

class StoreController extends Controller
{
    public function __invoke(StoreRequest $request)
    {
        $data = $request->validated();
        Contact::query()->create($data);
        SaveToFile::save('app/messages.txt', $data);
        return response($data);
    }
}
