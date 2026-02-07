<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Services\SliderService;
use App\Models\Slider;

class SliderController extends Controller
{
    protected $sliderService;

    public function __construct(SliderService $sliderService)
    {
        $this->sliderService = $sliderService;
    }

    /**
     * عرض كل السلايدرز
     */
    public function index()
    {
        $sliders = $this->sliderService->paginate(10); // 10 لكل صفحة
        return view('admin.sliders.index', compact('sliders'));
    }

    /**
     * عرض صفحة إنشاء سلايدر جديد
     */
    public function create()
    {
        return view('admin.sliders.add');
    }

    /**
     * حفظ سلايدر جديد
     */
    public function store(SliderRequest $request)
    {
        $data = $request->validated();

        // التأكد من القيمة الافتراضية لـ is_active
        $data['is_active'] = $data['is_active'] ?? 0;

        $this->sliderService->create($data);

        return redirect()->route('sliders.index')
            ->with('success', 'تم إضافة السلايدر بنجاح');
    }

    /**
     * عرض صفحة تعديل السلايدر
     */
    public function edit($id)
    {
        $slider = $this->sliderService->find($id);
        return view('admin.sliders.edit', compact('slider'));
    }

    /**
     * تحديث السلايدر
     */
    public function update(SliderRequest $request, $id)
    {
        $slider = $this->sliderService->find($id);
        $data = $request->validated();

        // التأكد من القيمة الافتراضية لـ is_active
        $data['is_active'] = $data['is_active'] ?? 0;

        $this->sliderService->update($slider, $data);

        return redirect()->route('sliders.index')
            ->with('success', 'تم تحديث السلايدر بنجاح');
    }

    /**
     * حذف السلايدر
     */
    public function destroy($id)
    {
        $slider = $this->sliderService->find($id);
        $this->sliderService->delete($slider);

        return redirect()->route('sliders.index')
            ->with('success', 'تم حذف السلايدر بنجاح');
    }
}
