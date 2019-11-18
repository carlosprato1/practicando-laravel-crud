{{--Para simplificar el formulario create-edit deben ser iguales, por eso antes hay que normalizar,
obligar a que create se le agrege esa variable "old('title',$project->title)" que no la tiene
para eso se le paso en create un "new proyecto"
--}}
@csrf
<label>
  Titulo del Proyecto <br>
  <input type="text" name="title"  value="{{ old('title',$project->title)}}">
    {!!$errors->first('title','<small>:message</small><br>')!!}
</label>
<br>
<label>
 URL del proyecto <br>
 <input type="text" name="url"  value="{{old('url',$project->url)}}">
  {!!$errors->first('url','<small>:message</small><br>')!!}
</label>
<br>
<label>
 Descripcion del proyecto <br>
 <textarea name='description'>{{old('description',$project->description)}}</textarea>
 {!!$errors->first('description','<small>:message</small><br>')!!}
</label>
<br>
<button>{{$btnTxt}}</button>
