<div class="text-center">
    @if (isset($obj)&&$obj->translate('en')->slug == 'visual-identity')
        <a href="{{route(app()->getLocale()=='en'?app()->getLocale().'.order.id':'order.id')}}" class="btn btn-primary btn-view">
            <b>
                @lang('pages.request_order')
            </b>
        </a>
    @else
        <a href="{{route(app()->getLocale()=='en'?app()->getLocale().'.order.photography':'order.photography')}}" class="btn btn-primary btn-view">
            <b>
                @lang('pages.request_order')
            </b>
        </a>
    @endif

</div>
