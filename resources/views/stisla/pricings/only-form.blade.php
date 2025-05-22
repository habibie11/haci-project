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
    'id' => 'logo',
    'name' => 'logo',
    'label' => __('Logo'),
    'type' => 'file',
    'required' => false,
    'icon' => 'fas fa-image',
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', [
    'id' => 'kecepatan',
    'name' => 'kecepatan',
    'label' => __('Kecepatan'),
    'type' => 'text',
    'required' => true,
    'icon' => 'fas fa-tachometer-alt',
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.editors.textarea', [
    'id' => 'benefit',
    'name' => 'benefit',
    'label' => __('Benefit'),
    'required' => true,
    'icon' => 'fas fa-check',
    'height' => '4rem',
    'hint' => 'Pisahkan dengan tanda , (koma)'
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input', [
    'id' => 'harga',
    'name' => 'harga',
    'label' => __('Harga'),
    'type' => 'text',
    'required' => true,
    'icon' => 'fas fa-dollar-sign',
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.selects.select', [
    'id' => 'kategori',
    'name' => 'kategori',
    'options' => $others['kategori'],
    'label' => 'Kategori',
    'required' => true,
    // 'selected' => $month,
    ])
  </div>
  <div class="col-md-6">
    @include('stisla.includes.forms.inputs.input-radio-toggle', [
    'required' => true,
    'id' => 'is_special_offer',
    'name' => 'is_special_offer',
    'label' => __('Spesial Offer'),
    'options' => [1 => 'Ya', 0 => 'Tidak'],
    'checked' => $d->is_special_offer ?? 0,
    ])
  </div>
</div>