<div class="form-group">
    <input type="text" class="form-control" name="title" placeholder="Titre" required value="{{ old('title') ?? $post->title ?? ''}}">
</div>

<div class="form-group">
    <textarea name="description" rows="1" class="form-control" placeholder="Description" required>{{ old('description') ?? $post->description ?? ''}}</textarea>
</div>


<div class="form-group">
    <input type="number" step="0.01" min="0" max="9999" class="form-control" name="brut" placeholder="Poids brut" required>
</div>

<div class="form-group">
    <input type="number" step="0.01" min="0" max="9999" class="form-control" name="prixDepart" placeholder="Prix depart" required>
</div>

<div class="form-group">
    <input type="number" step="0.01" min="0" max="9999" class="form-control" name="prixPlancher" placeholder="Prix plancher" required>
</div>


<div class="form-group">
<label for="fname">Type de bac:</label>
<select class="form-control" name="bac_id" required>

    @foreach($bacs as $id => $bac )
        <option value="{{ $id }}">{{ $bac }}</option>
    @endforeach
</select>
</div>

<div class="form-group">
    <label for="fname">Espece:</label>
    <select class="form-control" name="espece_id" required>

        @foreach($especes as $id => $espece )
            <option value="{{ $id }}">{{ $espece }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="fname">Taille:</label>
    <select class="form-control" name="taille_id" required>

        @foreach($tailles as $id => $taille )
            <option value="{{ $id }}">{{ $taille }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="fname">Bateau:</label>
    <select class="form-control" name="bateau_id" required>

        @foreach($bateaux as $id => $bateau )
            <option value="{{ $id }}">{{ $bateau }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="fname">Presentation:</label>
    <select class="form-control" name="presentation_id" required>

        @foreach($presentations as $id => $presentation )
            <option value="{{ $id }}">{{ $presentation }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="fname">Qualité:</label>
    <select class="form-control" name="qualite_id" required>

        @foreach($qualites as $id => $qualite )
            <option value="{{ $id }}">{{ $qualite }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="fname">Date:</label>
    <select class="form-control" name="date_id" required>

        @foreach($dates as $id => $date )
            <option value="{{ $id }}">{{ $date }}</option>
        @endforeach
    </select>
</div>

<div class="form-group">
    <label for="fname">Image (optionnel):</label>
    <input type="file" name="img">
</div>
