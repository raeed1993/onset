
<img id="image-filemanager{{$param}}" class="mb-1 mt-1"
     src="{{old($page.'-primary-image',!is_null($item->primary_image)?$item->primary_image:'http://127.0.0.1:8000/storage/images/sales-for-last-7-days.png')}}"
     width="250"
     onclick="togglemodalfilemanagerPage({{$param}},'{{$page}}')">
<div class="image-show{{$param}}">
    <input type="hidden" name="{{$page}}-primary-image" value="{{$item->primary_image}}">
</div>
