#!/bin/sh
# Build the served assets from their sources.
#
#   assets/css/style.src.css  ->  assets/css/style.css   (minified)
#   assets/js/main.src.js     ->  assets/js/main.js      (minified)
#
# Edit ONLY the .src files; style.css and main.js are generated and any manual
# change to them is lost on the next build. After building, bump the ?v= number
# on the asset links (they are cached for a month) so visitors get the new file:
#
#   grep -rl '?v=10' --include='*.html' --include='*.php' . \
#     | xargs sed -i 's/?v=10/?v=11/g'
#
# Requires Node. Run from the repository root:  sh build.sh
set -e

npx --yes csso-cli assets/css/style.src.css -o assets/css/style.css
npx --yes terser  assets/js/main.src.js -c -m -o assets/js/main.js

printf 'css  %6s -> %6s bytes\n' "$(wc -c < assets/css/style.src.css)" "$(wc -c < assets/css/style.css)"
printf 'js   %6s -> %6s bytes\n' "$(wc -c < assets/js/main.src.js)"  "$(wc -c < assets/js/main.js)"
