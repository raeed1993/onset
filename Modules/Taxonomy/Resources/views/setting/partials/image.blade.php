
<img id="image-filemanager{{$param}}" class="mb-1 mt-1"
     src="{{old($page.'-primary-image',!is_null($item->primary_image)?$item->primary_image:asset('images/boxed-bg.jpg'))}}"
     width="250"
     onclick="togglemodalfilemanagerPage({{$param}},'{{$page}}')">
<div class="image-show{{$param}}">
    <input type="hidden" name="{{$page}}-primary-image" value="{{$item->primary_image}}">
</div>
