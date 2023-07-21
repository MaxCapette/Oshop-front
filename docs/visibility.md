# Visibilité

Les propriétés et méthodes d'une classe peuvent être mises à disposition de toute partie du code ou restreinte à une partie.

## `public`

C'est "open bar".

Les propriétés sont accessibles et modifiables **depuis n'importe quelle partie du code**.
Les méthodes peuvent être appelées **depuis n'importe quelle partie du code**.

## `private`

C'est "fermé à clés".

Les propriétés sont accessibles et modifiables **depuis le code de la classe uniquement**.
Les méthodes peuvent être appelées **depuis le code de la classe uniquement**.

## `protected`

C'est "pour la famille".

![The Godfather](https://media.giphy.com/media/l0Iy89owS5CYP7Hk4/giphy-downsized.gif)

Les propriétés sont accessibles et modifiables **depuis le code de la classe, de ses descendants et de ses ancêtres**.
Les méthodes peuvent être appelées **depuis le code de la classe, de ses descendants et de ses ancêtres**.

## Analogie

_Je suis dans ma maison, et toutes les portes et fenêtres sont grandes ouvertes_
=> `public`

_Je suis dans ma maison, et j'ai fermé les fenêtres et fermé les portes à double-tour_
=> `private`

_Je suis dans ma maison, et j'ai fermé les fenêtres et fermé les portes à double-tour, mais j'ai donné un double à mes parents et à mes enfants_
=> `protected`