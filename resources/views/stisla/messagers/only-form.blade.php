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
    'id' => 'kebutuhan',
    'name' => 'kebutuhan',
    'label' => __('Kebutuhan'),
    'type' => 'text',
    'required' => false,
    'icon' => 'fas fa-list',
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', [
    'id' => 'no_wa',
    'name' => 'no_wa',
    'label' => __('No WA'),
    'type' => 'text',
    'required' => true,
    'icon' => 'fas fa-phone',
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', [
    'id' => 'maps',
    'name' => 'maps',
    'label' => __('Maps'),
    'type' => 'text',
    'required' => true,
    'icon' => 'fas fa-map-marker-alt',
    ])
  </div>
</div>
</div>