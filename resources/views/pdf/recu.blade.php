<style>
    body { font-family: 'Helvetica', sans-serif; color: #333; }
    .header { text-align: center; margin-bottom: 30px; }
    .footer { font-size: 10px; text-align: center; margin-top: 50px; color: #777; }
</style>
<div class="header">
    <h1 style="color: #4f46e5; margin-bottom: 5px;">SUUDJ KOUKOU</h1>
    <p>Reçu Officiel n° <strong>{{ $paiement->reference_recu }}</strong></p>
</div>
<p><strong>Pèlerin :</strong> {{ $paiement->pelerin->nom }} {{ $paiement->pelerin->prenom }}</p>
<p><strong>Voyage :</strong> {{ $paiement->pelerin->voyage->nom_voyage }}</p>
<p><strong>Montant Versé :</strong> {{ number_format($paiement->montant, 0, ',', ' ') }} FCFA</p>
<hr>
<h3 style="color: #b91c1c;">Solde restant : {{ number_format($solde, 0, ',', ' ') }} FCFA</h3>
<div class="footer">Document généré automatiquement le {{ date('d/m/Y H:i') }} • Agence Suudj Koukou</div>
