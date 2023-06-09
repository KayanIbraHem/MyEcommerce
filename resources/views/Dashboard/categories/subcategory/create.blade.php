@extends('layouts.master')
@section('css')

@section('title')
    اضافة قسم فرعي
@stop
@endsection
@section('page-header')
<!-- breadcrumb -->
<div class="page-title">
    <div class="row">
        <div class="col-sm-6">
            <h4 class="mb-0">اضافة قسم فرعي</h4>
        </div>
        <div class="col-sm-6">
            <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right ">
                <li class="breadcrumb-item"><a href="#" class="default-color">الرئيسية</a></li>
                <li class="breadcrumb-item active">اضافة قسم فرعي</li>
            </ol>
        </div>
    </div>
</div>
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <div class="col-xs-12">
                    <div class="col-md-12">
                        <form action="{{ route('category.subcategory.store') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-row">
                                <div class="col">
                                    <label for="exampleInputEmail1">الاسم</label>
                                    <input type="text" name='name' value="{{ old('name') }}"
                                        class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label for="exampleFormControlSelect1" class="mb-1">القسم الرئيسي</label>
                                    <select name="parent_id" id="exampleFormControlSelect1"
                                        class="custom-select my-1 mr-sm-2">
                                        @foreach ($mainCategories as $category)
                                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col">
                                    <label for="exampleInputEmail1">الصورة</label>
                                    <input type="file" name="image" class="form-control dropify">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary">تأكيد</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')

@endsection
