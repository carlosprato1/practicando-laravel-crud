{{--Para simplificar el formulario create-edit deben ser iguales, por eso antes hay que normalizar,
obligar a que create se le agrege esa variable "old('title',$project->title)" que no la tiene
para eso se le paso en create un "new proyecto"
--}}
  @csrf
  <div class="form-group">
        <label for='title'>Titulo del Proyecto</label>
        <input class="form-control border-0 bg-light shadow-sm"
           id="title"
           type="text"
           name="title"
           value="{{ old('title',$project->title)}}"
        >
  </div>

  <div class="form-group">
        <label for='url'>URL del proyecto </label>
        <input class="form-control border-0 bg-light shadow-sm"
           id="url"
           type="text"
           name="url"
           value="{{ old('url',$project->url)}}"
        >
  </div>

  <div class="form-group">
        <label for='description'>Descripcion del proyecto </label>
        <textarea class="form-control border-0 bg-light shadow-sm"
           id="description"
           name="description"
        >
          {{ old('description',$project->description)}}</textarea>
  </div>
    <button class="btn btn-primary btn-lg btn-block">{{$btnTxt}}</button>

    <a class="btn btn-link btn-block"
    href=" {{route('projects.index')}} ">Cancelar</a>
