<h3 class="text-capitalize">{{$link}}  </h3><br>
<div class="form-group  mb-1 mt-1">
    <div class="row">

        <input type="hidden" name="ids[]" value="{{$item->id}}">
        <div class="col-md-8">
            <div class="row">
                <div class="col-md-4">

                </div>
                <div class="col-md-8">

                    <input class="form-control" value="{{old($link.'-links',$item->links[0])}}"
                           name="{{$link}}-links[]">
                </div>

            </div>

            @if ($item->translate('en')->slug == 'location')
                <hr/>
                <div class="row">
                    <div class="col-md-4">
                        Label Location
                    </div>

                    <div class="col-md-8">

                        <input class="form-control" value="{{old($link.'-labels',$item->translate('en')->content)}}"
                               name="{{$link}}-labels[]">
                    </div>

                </div>
            @endif

        </div>

    </div>

    <hr/>
</div>

