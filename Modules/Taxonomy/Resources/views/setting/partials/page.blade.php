<h3 class="">{{$page}} Page </h3><br>
<div class="form-group  mb-1 mt-1">
    <div class="row">
        <div class="col-md-4">
            @include('taxonomy::setting.partials.image',['param'=>$param,'page'=>$page])
        </div>
        <input type="hidden" name="ids[]" value="{{$item->id}}">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-6">
                    <label class="text-capitalize">{{$page}} Title AR</label><br>
                    <input class="form-control" value="{{old($page.'-title-ar',$item->translate('ar')->title)}}"
                           name="{{$page}}-title-ar">
                </div>
                <div class="col-md-6">
                    <label class="">{{$page}} Title EN</label><br>
                    <input class="form-control" value="{{old($page.'-title-en',$item->translate('en')->title)}}"
                           name="{{$page}}-title-en">
                </div>
            </div>
            <hr/>
            <div class="row">
                <div class="col-md-6">
                    <label class="text-capitalize">{{$page}} Content AR</label><br>
                    <textarea class="form-control"
                              rows="5"
                              name="{{$page}}-content-ar">{{old($page.'-content-ar',$item->translate('ar')->content)}}</textarea>
                </div>
                <div class="col-md-6">
                    <label class="text-capitalize">{{$page}} Content EN</label><br>
                    <textarea class="form-control"
                              rows="5"
                              name="{{$page}}-content-en">{{old($page.'-content-en',$item->translate('en')->content)}}</textarea>
                </div>
            </div>

        </div>

    </div>

    <hr/>
</div>

