---
target: site
total_score: 20
max_score: 32
na_heuristics: 7,10
p0_count: 0
p1_count: 2
target_identity: "file:/home/daniel/work/projects/daertech/site/resources/views/pages"
timestamp: 2026-11-11T10-35-28Z
slug: resources-views-pages
---
# Critique — site public DaerTech (resources/views/pages)
Method: dual-agent (A: revue design · B: détecteur + navigateur)

## Design Health Score
| # | Heuristique | Note | Problème clé |
|---|---|---|---|
| 1 | Visibilité de l'état | 2 | Contact : aucune indication de ce qui suit l'envoi ; erreurs serveur seulement, sans résumé |
| 2 | Correspondance monde réel | 3 | Bandeau Laravel/React/Flutter = jargon pour un commerçant |
| 3 | Contrôle et liberté | 3 | Correct (menu, lien d'évitement, retours) |
| 4 | Cohérence | 3 | Système unifié ; 77 valeurs CSS hors tokens |
| 5 | Prévention des erreurs | 2 | `novalidate`, pas de `maxlength`, aucun exemple de message |
| 6 | Reconnaissance | 3 | Pas d'exemple ni d'aide dans le formulaire |
| 7 | Flexibilité | n/a | Vitrine, pas d'usage expert |
| 8 | Esthétique minimaliste | 2 | Accueil chargé : bandeau, fils, quadrillage, labels mono, 3 CTA |
| 9 | Récupération d'erreurs | 2 | Message par champ mais validation serveur seule |
| 10 | Aide | n/a | Pas de produit complexe |
| **Total** | | **20/32** | **Acceptable (62 %)** |

## Priority Issues
- [P1] Contact sans réassurance : délai de réponse, qui répond, « sans engagement », suite après « Envoyer » absents. → /impeccable clarify
- [P1] Contenu de démonstration visible (bannière et articles « [DÉMO] »). → à retirer avant mise en ligne / /impeccable harden
- [P2] Accueil trop chargé : 6 entrées de menu, 3 CTA concurrents, bandeau de technos qui défile. → /impeccable distill (+ quieter)
- [P2] Faux chiffres « 4 étapes », « 3 domaines » qui imitent des métriques. → /impeccable clarify
- [P2] Lisibilité : mono capitales espacées, paragraphe de 38 car. en capitales, lignes à ~87 car. → /impeccable typeset

## Persona Red Flags
- Jordan : « Marketing stratégique », « API REST », « Flutter » sans explication ; aucune idée de prix ni de durée.
- Casey : portrait 960 px en priorité haute, bandeau animé, schémas SVG ; bouton WhatsApp flottant peut couvrir « Envoyer ».
- Riley : formulaire vide envoyé sans contrôle navigateur ; « Aucun article pour le moment. » sans suite.
- Awa : ne sait ni le coût, ni le délai, ni qui répond ; préférera WhatsApp.

## Minor Observations
- Cibles < 44 px : lien logo (36 px de haut), liens d'articles (~25 px).
- Contraste 1.7:1 signalé sur `.grad` : probable faux positif (fond = soulignement de 0.075em).
- URL de la bannière démo pointe sur APP_URL :8000 : image cassée en local seulement.

## Questions
- Le portrait est le meilleur atout : pourquoi pas un prénom et le WhatsApp juste dessous ?
- Un commerçant a-t-il besoin de lire « Laravel » ou « site pour vendre en ligne » ?
- Sans bandeau, fils et quadrillage, que resterait-il de DaerTech ?
