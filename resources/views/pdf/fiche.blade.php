<style>
    body { font-family: DejaVu Sans, sans-serif; }
    .header { text-align: center; border-bottom: 1px solid #000; }
</style>
<div class="header">
    <h2>SUUDJ KOUKOU - FICHE PÈLERIN</h2>
</div>
<p><strong>Nom :</strong> {{ $pelerin->nom }}</p>
<p><strong>Prénom :</strong> {{ $pelerin->prenom }}</p>
<p><strong>Passeport :</strong> {{ $pelerin->numero_passport }}</p>
<p><strong>Voyage :</strong> {{ $pelerin->voyage->nom_voyage }}</p>
<p><strong>Type :</strong> {{ $pelerin->voyage->type_voyage }}</p>
