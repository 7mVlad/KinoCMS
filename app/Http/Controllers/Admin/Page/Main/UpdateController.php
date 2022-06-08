<?php

namespace App\Http\Controllers\Admin\Page\Main;

use App\Http\Requests\Admin\Page\Main\UpdateRequest;
use App\Models\MainPage;

class UpdateController extends BaseController
{
    public function __invoke(UpdateRequest $request)
    {
        $mainPage = MainPage::find(1);

        $data = $request->validated();

        $data = $this->service->seoUpdate($data, $mainPage);

        $mainPage->update($data);

        return redirect()->route('admin.page.index');
    }
}
