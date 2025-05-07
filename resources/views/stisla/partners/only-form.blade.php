@isset($d)
@method('PUT')
@endisset

@csrf
<div class="row">
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-name', ['name' => 'nama', 'required' => true])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', [
    'id' => 'image',
    'name' => 'image',
    'label' => __('Logo'),
    'type' => 'file',
    'required' => true,
    'icon' => 'fas fa-image',
    ])
  </div>
</div>