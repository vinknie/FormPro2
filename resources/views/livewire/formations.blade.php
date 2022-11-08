
<div>
    {{-- <div class="row mt-5">
        <h1 class="fs-5 text-center">Créer une formation</h1>
   </div> --}}
        {{-- <div class="col-6">
            <label class="visually-hidden">Nom de la Formation</label>
            <input type="text" class="form-control" wire:model="nomformation.0" placeholder="Nom de la formation">
            @error('nomformation.0') <span class="text-danger error">{{ $message }}</span>@enderror
        </div> --}}
        <div class="col-6">
            <label class="visually-hidden">Nom de la Matiere</label>
            <input type="text" class="form-control" wire:model="nommatiere.0" placeholder="Nom de la matiere">
            @error('nommatiere.0') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>

        <div class="col-4">
            <select class="form-select" aria-label="Default select example" wire:model="id_utilisateurs.0">
                <option value="">--choisi un Formateur--</option>

                @foreach ($selectformateur as $formateur)

                     <option value="{{ $formateur->id }}"> {{ $formateur->nom_complet }} </option>

                @endforeach
            </select>
            @error('id_utilisateurs.0') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>

        <div class="col-2">
            <button class="btn btn-primary mb-3" wire:click.prevent="add({{$i}})"><i class="bi bi-plus"></i></button>
        </div>
        {{-- Add Form --}}
        @foreach ($inputs as $key => $value)

        <div class="col-6">
            <label class="visually-hidden">Nom de la Matiere</label>
            <input type="text" class="form-control" wire:model="nommatiere.{{ $value }}" placeholder="Nom de la matiere">
            @error('nommatiere.') <span class="text-danger error">{{ $message }}</span>@enderror
        </div>
         <div class="col-4">
            <select class="form-select" aria-label="Default select example" wire:model="id_utilisateurs.{{ $value }}">
                <option value="">--choisi un Formateur--</option>

                @foreach ($selectformateur as $formateur)

                     <option value="{{ $formateur->id }}"> {{ $formateur->nom_complet }} </option>

                @endforeach
            </select>
            @error('id_utilisateurs.0') <span class="text-danger error">{{ $message }}</span>@enderror
        </div> 

        <div class="col-2">
            <button class="btn btn-light mb-3" wire:click.prevent="remove({{$key}})"><i class="bi bi-x"></i></button>
        </div>
        @endforeach

        {{-- <div class="row">
            <div class="col-12 ps-0">
                 <button type="button" class="btn btn-primary" wire:click.prevent="addformation()">Créer</button>
            </div>
        </div> --}}

</div>




