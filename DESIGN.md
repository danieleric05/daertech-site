---
name: DaerTech
description: Facettes — l'hexagone du logo DaerTech décliné en système visuel, sur fond de nuit profonde.
colors:
  brand-blue: "#2a8fc0"
  brand-teal: "#0a9a9a"
  brand-orange: "#e8734a"
  brand-red: "#c8323f"
  tint-blue: "#6cc3ee"
  tint-teal: "#3fd6cc"
  tint-orange: "#f59a72"
  tint-red: "#ff8791"
  action-blue: "#1a6e9a"
  action-teal: "#08777a"
  night: "#060912"
  night-1: "#080c16"
  night-2: "#0a101d"
  night-3: "#0d1424"
  footer-night: "#04060b"
  on-dark: "#cdd6e4"
  on-dark-muted: "#a3afc2"
  sky: "#8fd0f0"
  focus-sky: "#8fd8ff"
  focus-teal: "#2fd2c8"
  whatsapp: "#0e7a3e"
  ink: "#0a0a0c"
  muted: "#4b515c"
  line: "#e3e8ec"
  soft: "#f4f8fa"
  surface: "#ffffff"
  brand-blue-dark: "#1c6f98"
  brand-teal-dark: "#087373"
  admin-dark-soft: "#0a0f18"
  admin-dark-surface: "#121b2a"
  admin-dark-line: "#27344a"
  admin-dark-ink: "#e7edf6"
  admin-dark-accent: "#7cc8f2"
typography:
  display:
    fontFamily: "Bricolage Grotesque, Plus Jakarta Sans, ui-sans-serif, system-ui, sans-serif"
    fontSize: "clamp(2.5rem, 8.6vw, 4.6rem)"
    fontWeight: 800
    lineHeight: 1.02
    letterSpacing: "-0.045em"
  headline:
    fontFamily: "Bricolage Grotesque, Plus Jakarta Sans, ui-sans-serif, system-ui, sans-serif"
    fontSize: "clamp(2rem, 4.6vw, 3.25rem)"
    fontWeight: 800
    lineHeight: 1.04
    letterSpacing: "-0.035em"
  title:
    fontFamily: "Bricolage Grotesque, Plus Jakarta Sans, ui-sans-serif, system-ui, sans-serif"
    fontSize: "1.3rem"
    fontWeight: 800
    lineHeight: 1.15
    letterSpacing: "-0.02em"
  body:
    fontFamily: "Plus Jakarta Sans, ui-sans-serif, system-ui, Segoe UI, Roboto, sans-serif"
    fontSize: "1rem"
    fontWeight: 400
    lineHeight: 1.625
  lead:
    fontFamily: "Plus Jakarta Sans, ui-sans-serif, system-ui, Segoe UI, Roboto, sans-serif"
    fontSize: "1.2rem"
    fontWeight: 400
    lineHeight: 1.625
  label:
    fontFamily: "JetBrains Mono, ui-monospace, SFMono-Regular, Menlo, Consolas, monospace"
    fontSize: "0.78rem"
    fontWeight: 500
    letterSpacing: "0.12em"
rounded:
  box: "1.25rem"
  tile: "0.9rem"
  ctl: "0.85rem"
  field-admin: "0.75rem"
  chip-square: "0.7rem"
  pill: "999px"
spacing:
  gutter: "1rem"
  container: "72rem"
  card: "1.75rem"
  section-mobile: "4.75rem"
  section-desktop: "6.5rem"
  head-gap: "3rem"
components:
  button-primary:
    backgroundColor: "{colors.action-blue}"
    textColor: "{colors.surface}"
    rounded: "{rounded.ctl}"
    padding: "0.75rem 1.25rem"
    typography: "{typography.body}"
  button-whatsapp:
    textColor: "{colors.surface}"
    rounded: "{rounded.ctl}"
    padding: "0.75rem 1.25rem"
  button-light:
    backgroundColor: "{colors.surface}"
    textColor: "{colors.ink}"
    rounded: "{rounded.ctl}"
    padding: "0.75rem 1.25rem"
  wa-float:
    backgroundColor: "{colors.whatsapp}"
    textColor: "{colors.surface}"
    rounded: "{rounded.pill}"
    padding: "0.75rem 1.25rem"
  card:
    textColor: "{colors.on-dark-muted}"
    rounded: "{rounded.box}"
    padding: "{spacing.card}"
  chip:
    textColor: "{colors.on-dark}"
    rounded: "{rounded.pill}"
    padding: "0.4rem 0.85rem 0.4rem 0.65rem"
    typography: "{typography.label}"
  input-site:
    textColor: "{colors.surface}"
    rounded: "{rounded.ctl}"
    padding: "0.75rem 1rem"
  input-admin:
    backgroundColor: "{colors.surface}"
    textColor: "{colors.ink}"
    rounded: "{rounded.field-admin}"
    padding: "0.75rem 1rem"
  admin-panel:
    backgroundColor: "{colors.surface}"
    textColor: "{colors.ink}"
    rounded: "{rounded.box}"
    padding: "1.5rem"
  admin-nav-active:
    textColor: "{colors.brand-blue-dark}"
    rounded: "{rounded.field-admin}"
    height: "2.75rem"
---

# Design System: DaerTech

## Overview

**Creative North Star: "Facettes"**

Le logo DaerTech est un hexagone en quatre facettes (bleu, teal, orange, rouge). Tout le système en découle : l'hexagone devient puce, nœud de schéma, numéro d'étape, séparateur de section, bouton de navigation et filigrane. Le site public vit sur une nuit profonde quadrillée, où les quatre teintes ne s'allument que par petites touches : un filet, une lueur, un chiffre. L'effet recherché est celui d'un atelier technique éclairé de l'intérieur, sérieux mais vivant.

Le caractère est **technique et ludique**. Technique par le mono (JetBrains Mono) des libellés, le quadrillage blueprint, les schémas à fils et nœuds, les numéros tabulaires. Ludique par le mouvement : projecteur qui suit le pointeur sur les cartes, flèches qui glissent, chaîne d'hexagones accrochée aux filets, bandeau qui défile, impulsions le long des fils. Chaque effet se coupe sous `prefers-reduced-motion`.

L'administration partage les mêmes tokens (dégradé de marque, hexagones, polices) mais bascule en mode Operate : fond clair `soft`, panneaux blancs, ombres douces, accent bleu foncé, et un mode sombre complet piloté par `data-theme`.

**Key Characteristics:**
- Fond nuit (#060912 à #0d1424) avec quadrillage fin de 28 px, jamais un aplat nu.
- Hexagone (ratio 52 / 60) comme unique forme signature ; pas de points ronds, pas d'icônes génériques en puce.
- Quatre teintes de marque attribuées par service, en version claire pour le texte sur fond sombre.
- Typo display Bricolage Grotesque très serrée (−0,035 à −0,045 em), corps Plus Jakarta Sans, libellés en JetBrains Mono capitales espacées.
- Verre discret (blanc 4 %) et filets blancs 10 % plutôt qu'ombres portées.
- Mouvement court sur `cubic-bezier(0.23, 1, 0.32, 1)`, toujours désactivable.

## Colors

Quatre teintes vives tirées du logo, posées sur une gamme de nuits bleutées ; la couleur sert d'éclairage, pas de remplissage.

### Primary
- **Bleu Facette** (#2a8fc0) : teinte de tête. Conseil et assistance, lueurs du hero, ombre colorée des boutons et des cartes, premier hexagone de la chaîne.
- **Bleu Action** (#1a6e9a) vers **Teal Action** (#08777a) : dégradé à 135° du bouton principal. Assez sombres pour un texte blanc AA.

### Secondary
- **Teal Facette** (#0a9a9a) : développement web, mot souligné du hero (`.grad`), puce de la page active en navigation mobile, focus des champs (#2fd2c8).

### Tertiary
- **Orange Facette** (#e8734a) : formation et mobile, troisième étape du parcours.
- **Rouge Facette** (#c8323f) : marketing, quatrième étape, fin de la chaîne.

### Teintes de texte sur nuit
- **Bleu Ciel** (#6cc3ee), **Teal Lagon** (#3fd6cc), **Orange Corail** (#f59a72), **Rose Signal** (#ff8791) : versions éclaircies des quatre facettes, réservées au texte et aux chiffres sur fond sombre (contraste AA). Exposées par service via `--tone-t`.

### Neutral
- **Nuit** (#060912) : fond du body et du hero.
- **Nuit 1 / 2 / 3** (#080c16, #0a101d, #0d1424) : paliers de sections (`.section`, `.dark`, `.alt`), qui séparent les blocs par la valeur plutôt que par une bordure.
- **Nuit de pied** (#04060b) : footer, le plus profond.
- **Brume** (#cdd6e4) : texte courant sur nuit. **Brume voilée** (#a3afc2) : paragraphes secondaires, leads, descriptions de cartes.
- **Ciel** (#8fd0f0) : liens sur nuit, blanc au survol.
- **Encre** (#0a0a0c), **Gris ardoise** (#4b515c), **Filet** (#e3e8ec), **Brume claire** (#f4f8fa), **Blanc** : gamme claire de l'administration.
- **Vert WhatsApp** (#0e7a3e) : bouton flottant WhatsApp uniquement ; le bouton WhatsApp en ligne porte un hexagone vert vif (#3be07f).

### Named Rules
**The One Tone Per Service Rule.** Chaque service a une teinte fixe (conseil/assistance = bleu, web = teal, mobile/formation = orange, marketing = rouge), transmise par les variables `--tone`, `--tone-t`, `--hexbg`. Ne jamais recolorer un service au cas par cas.

**The Light-Tint Text Rule.** Sur fond nuit, le texte coloré utilise toujours la teinte claire (`tint-*`), jamais la teinte de marque brute.

**The Four-In-Order Rule.** Quand les quatre teintes apparaissent ensemble (chaîne, filets de header et footer, dégradé de soulignement), l'ordre est bleu, teal, orange, rouge.

## Typography

**Display Font:** Bricolage Grotesque (avec Plus Jakarta Sans, system-ui)
**Body Font:** Plus Jakarta Sans (avec system-ui, Segoe UI, Roboto)
**Label/Mono Font:** JetBrains Mono (avec ui-monospace, Menlo, Consolas)

**Character:** Un grotesque expressif et serré pour les titres, qui porte la personnalité ; un sans humaniste net pour la lecture ; un mono pour tout ce qui relève de l'étiquette, de la donnée ou du code.

### Hierarchy
- **Display** (800, clamp(2.5rem, 8.6vw, 4.6rem), 1.02) : titre du hero d'accueil, 16ch max. Pages intérieures : clamp(2.3rem, 6.4vw, 4rem), 22ch max. CTA final : clamp(2.3rem, 6vw, 4rem), 14ch max.
- **Headline** (800, clamp(2rem, 4.6vw, 3.25rem), 1.04) : titres de section, `text-wrap: balance`.
- **Title** (800, 1.3rem, −0.02em) : cartes, étapes, engagements (1.2rem). Lignes de services : clamp(1.2rem, 2.6vw, 1.65rem).
- **Body** (400, 1rem, 1.625) : texte courant, `text-wrap: pretty`. Prose et lead : 1.1 à 1.2rem, 48rem max pour la prose, 36rem pour le lead.
- **Label** (500, 0.78rem, 0.12em, capitales) : surtitres de section précédés d'un hexagone, eyebrow du hero, chips, méta des articles, titres de colonnes du footer.
- **Chiffre** (Bricolage 800, clamp(3rem, 6vw, 4.25rem), 0.95) : chiffres des engagements et numéros de services, en teinte claire du service, `tabular-nums`.

### Named Rules
**The Mono Means Metadata Rule.** JetBrains Mono est réservé aux libellés, méta, chips, numéros d'étape et liens « Lire l'article ». Jamais pour un titre ni un paragraphe.

**The Tight Display Rule.** Plus le titre est grand, plus l'interlettrage est serré : −0.02em (title), −0.035em (headline), −0.045em (display).

## Layout

Conteneur unique `min(100% - 2rem, 72rem)` centré, soit une gouttière de 1rem sur mobile. Mobile d'abord, avec trois paliers : 48rem (grilles à 3 colonnes, paddings élargis), 64rem (navigation horizontale, hero à deux colonnes 1.04fr / 0.96fr, en-têtes de section en grille titre / texte, étapes horizontales), 80rem (navigation plus aérée).

Le rythme vertical est généreux : sections de 4.75rem (mobile) à 6.5–7rem (desktop), en-têtes de section suivis de 3rem. Le hero d'accueil occupe la hauteur de l'écran moins le header (`100svh - 4.25rem`). Les services sont une liste numérotée pleine largeur (numéro, texte, bouton hexagonal) plutôt qu'une grille de cartes ; les engagements et les actualités utilisent des grilles de 1 à 3 colonnes avec 1 à 1.25rem d'écart.

Les sections alternent trois paliers de nuit et sont séparées par un filet en dégradé surmonté de la chaîne de quatre hexagones, alignée sur le bord gauche du conteneur.

Administration : barre latérale de 15rem collante sur desktop, horizontale défilante sur mobile ; zone principale avec 1.25rem puis 2.5rem de padding.

## Elevation & Depth

Le site public est plat par défaut ; la profondeur vient de la lumière, pas de l'ombre. Les surfaces sont du verre très léger (blanc 4 %) cerné d'un filet blanc 10 %, posé sur des nuits de valeurs différentes. Des lueurs radiales des quatre teintes éclairent les héros et sections sombres. Les ombres n'apparaissent qu'en réponse à un état (survol) ou sur les éléments d'action, et elles sont colorées, jamais noires et diffuses.

### Shadow Vocabulary
- **Lueur d'action** (`box-shadow: 0 0 0 1px rgb(255 255 255 / 0.16) inset, 0 10px 30px -8px rgb(42 143 192 / 0.7)`) : bouton principal au repos ; au survol, la lueur vire au teal (`0 14px 38px -6px rgb(47 210 200 / 0.55)`).
- **Halo de carte** (`box-shadow: 0 24px 60px -26px rgb(42 143 192 / 0.5)`) : cartes au survol, avec élévation de 4px.
- **Halo de formulaire** (`box-shadow: 0 40px 90px -40px rgb(42 143 192 / 0.45)`) : panneau de verre du formulaire de contact.
- **Ombre douce admin** (`box-shadow: 0 1px 2px rgb(10 10 12 / 0.04), 0 8px 24px -8px rgb(10 10 12 / 0.1)`) : panneaux et tuiles de l'administration.

### Named Rules
**The Light Not Shadow Rule.** Sur le site public, une surface se détache par un filet, un verre ou une lueur colorée. Pas d'ombre grise portée.

## Shapes

Deux familles cohabitent : des rectangles aux coins généreusement arrondis pour les contenants, et l'hexagone pointe en haut (`clip-path: polygon(50% 0, 100% 25%, 100% 75%, 50% 100%, 0 75%, 0 25%)`, ratio 52 / 60) pour tout ce qui signale, numérote ou relie. Rayons : 1.25rem pour les cartes, panneaux et images ; 0.85rem pour les boutons et champs ; 0.9rem pour les tuiles d'engagement ; 0.7rem pour les étiquettes du bandeau ; pilule pour les chips, l'eyebrow et le bouton WhatsApp flottant.

Les motifs hexagonaux sont des SVG en data-URI exposés comme variables : contour teinté (`--hex-*`), plein (`--hexs-*`), chaîne de quatre (`--chain`), trame en nid d'abeille (`--honey`, 56 × 97 px) et « fleur » de sept hexagones (`--flower`) en filigrane des héros intérieurs, du CTA et du contact.

### Named Rules
**The Hexagon Is The Bullet Rule.** Toute puce, marqueur d'état actif, numéro ou nœud est un hexagone. Pas de point rond, pas de coche générique.

## Components

### Buttons
Précis et lumineux, avec une réponse physique au survol.
- **Shape:** coins arrondis (0.85rem), padding 0.75rem × 1.25rem, graisse 700, 0.95rem.
- **Primary:** dégradé 135° Bleu Action vers Teal Action, texte blanc, liseré intérieur blanc 16 %, lueur bleue.
- **Hover / Focus:** sur pointeur fin, montée de 2px, luminosité +14 %, lueur teal ; à l'appui, échelle 0.98. Focus : contour 3px #8fd8ff décalé de 3px.
- **WhatsApp:** verre blanc 7 % cerné de blanc 26 %, précédé d'un petit hexagone vert vif ; au survol, verre 14 % et lueur verte.
- **Light:** fond blanc, texte encre, ombre sombre ; utilisé sur les fonds blueprint (CTA).
- **Flottant WhatsApp:** pilule vert WhatsApp fixée en bas à droite, toujours visible.

### Chips
- **Style:** pilule en verre blanc 3,5 %, filet blanc 12 %, texte mono 0.78rem, précédée d'un hexagone plein qui change de teinte (teal, orange, rouge) selon le rang.
- **Bandeau technologies:** même logique en rectangle 0.7rem, défilement continu de 50s, pause au survol, masque en fondu sur les bords.

### Cards / Containers
- **Corner Style:** 1.25rem.
- **Background:** verre blanc 4 % sur nuit, filet blanc 10 % (22 % au survol).
- **Shadow Strategy:** halo de carte au survol seulement (voir Elevation).
- **Signature:** un projecteur radial bleu suit le pointeur (`--mx`, `--my`) ; le lien du titre couvre toute la carte ; le lien mono « → » glisse de 4px au survol.
- **Visuel (`.art`):** bandeau 16 / 9 en trame nid d'abeille teintée par la couleur du service, avec schéma SVG ou image.
- **Internal Padding:** 1.75rem.

### Inputs / Fields
- **Site (panneau de verre):** fond noir 60 %, filet blanc 42 %, coins 0.85rem, libellé #e8eef7. Focus : bordure et contour teal #2fd2c8 avec halo teal 18 %. Erreur : bordure #ff7a89, message #ff9fab.
- **Admin:** fond blanc, filet #8b95a1, coins 0.75rem. Focus : bordure et contour bleu foncé. Erreur : #b00020. Champ fichier en pointillés sur Brume claire.

### Navigation
- **Site:** header collant en verre nuit 78 % avec flou de 16px, souligné d'un filet des quatre teintes à 50 %. Liens 600, #d4dbe8, blanc au survol. Desktop (64rem+) : soulignement en dégradé qui se déploie depuis la gauche. Mobile : bouton carré 2.75rem, panneau déroulant, page active marquée d'un hexagone teal.
- **Admin:** barre latérale avec filet de marque de 3px en tête ; entrées de 2.75rem précédées d'un hexagone à 35 % d'opacité ; entrée active sur fond accent 12 %, hexagone en dégradé des quatre teintes.

### Parcours en étapes (signature)
Quatre étapes numérotées « 01 » à « 04 » dans des hexagones de 3.6rem, un par teinte dans l'ordre de la chaîne, reliées par un connecteur en dégradé de la teinte courante vers la suivante : vertical sur mobile, horizontal sur desktop.

### Liste de services numérotée (signature)
Lignes pleine largeur : grand numéro en teinte claire du service, titre et description, bouton hexagonal teinté à 22 % qui se remplit de la teinte pleine au survol de la ligne.

### Tuiles de statistiques admin
Panneaux blancs à coins 1.25rem, chiffre mono 2.25rem, hexagone double (contour et cœur plein) dans le coin, teinte variant par rang.

## Do's and Don'ts

### Do:
- **Do** poser chaque section du site sur un palier de nuit (#060912 à #0d1424) avec le quadrillage de 28px ou la trame nid d'abeille.
- **Do** attribuer la teinte d'un service via `.t-conseil`, `.t-web`, `.t-mobile`, `.t-formation`, `.t-marketing`, `.t-assistance`.
- **Do** utiliser les teintes claires (#6cc3ee, #3fd6cc, #f59a72, #ff8791) pour tout texte coloré sur nuit.
- **Do** marquer libellés, méta et numéros en JetBrains Mono capitales espacées de 0.12em.
- **Do** garder des cibles tactiles d'au moins 2.75rem (44px) et un contour de focus visible de 3px.
- **Do** couper toute animation sous `prefers-reduced-motion: reduce`.
- **Do** réutiliser les variables `--hex-*`, `--hexs-*`, `--chain`, `--honey`, `--flower` plutôt que de redessiner un hexagone.

### Don't:
- **Don't** modifier le logo hexagonal ni ses quatre couleurs.
- **Don't** utiliser de puce ronde, d'icône générique en guise de puce ou de coche : l'hexagone remplit ce rôle.
- **Don't** poser une ombre portée grise sur le site public ; utiliser filet, verre ou lueur colorée.
- **Don't** écrire un texte en teinte de marque brute (#2a8fc0, #c8323f…) sur fond nuit : contraste insuffisant.
- **Don't** mélanger l'ordre des quatre teintes quand elles apparaissent ensemble.
- **Don't** appliquer les styles du site public hors du scope `.site` : l'administration garde son thème clair et son mode sombre.
