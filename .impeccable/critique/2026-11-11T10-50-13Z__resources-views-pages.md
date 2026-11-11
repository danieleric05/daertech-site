---
target: site
total_score: 23
max_score: 32
na_heuristics: 7,10
p0_count: 0
p1_count: 1
target_identity: "file:/home/daniel/work/projects/daertech/site/resources/views/pages"
timestamp: 2026-11-11T10-50-13Z
slug: resources-views-pages
---
# Critique — site public DaerTech (2e passe, après typeset/clarify/harden/distill/polish)
Method: dual-agent (A: revue design · B: détecteur + navigateur)

## Design Health Score
| # | Heuristique | Note | Problème clé |
|---|---|---|---|
| 1 | Visibilité de l'état | 3 | Pas d'état « envoi en cours » sur le bouton Envoyer |
| 2 | Correspondance monde réel | 3 | Bandeau API REST / Tailwind / Git = jargon (choix assumé) |
| 3 | Contrôle et liberté | 3 | RAS |
| 4 | Cohérence | 3 | Services en liste numérotée (accueil) vs cartes (pages service) |
| 5 | Prévention des erreurs | 3 | maxlength, aide, exemple, validation navigateur |
| 6 | Reconnaissance | 3 | RAS |
| 7 | Flexibilité | n/a | Vitrine |
| 8 | Esthétique minimaliste | 3 | Milieu d'accueil long (~6 800 px à 500 px) |
| 9 | Récupération d'erreurs | 2 | Résumé d'erreurs mais pas de focus sur la première erreur |
| 10 | Aide | n/a | Vitrine |
| **Total** | | **23/32** | **Good (72 %)** |

## Priority Issues
- [P1] Portrait (seule preuve humaine) sous le pli sur mobile, après CTA et puces. → /impeccable layout
- [P2] « Sujet » obligatoire + e-mail obligatoire : friction pour qui préfère le téléphone. → /impeccable distill
- [P2] Pas d'état d'envoi, pas de focus sur la première erreur. → /impeccable harden
- [P2] Promesse « 24 h » sans précision (jours ouvrés ?). → /impeccable clarify
- [P3] Deux paragraphes de l'accueil à ~100 car./ligne (à localiser). → /impeccable typeset

## Persona Red Flags
- Jordan : ne voit qui est derrière qu'après défilement.
- Casey : 11 fichiers de police (3 familles, 5 graisses de Plus Jakarta).
- Riley : erreurs de validation non testées en navigateur.
- Awa : Sujet + e-mail obligatoires la freinent ; WhatsApp non visible en local (réglage vide).

## Minor Observations
- Contraste 1.7:1 sur `.grad` : faux positif probable (fond = soulignement).
- icon-tile-stack x2 (tuiles d'icônes au-dessus des titres de cartes service).
- Vérifier téléphone/e-mail/WhatsApp renseignés dans les réglages de production.
