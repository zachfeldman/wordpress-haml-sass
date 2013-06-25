theme_dir="theme"

php lib/MtHaml/compile.php "/../../$theme_dir/" 
sass app/assets/stylesheets/compiled.sass:$theme_dir/compiled.css
cp app/assets/stylesheets/style.css $theme_dir/style.css
cp -R app/assets/images $theme_dir
cp -R app/assets/scripts_uncompiled/ $theme_dir/scripts

files=`find app/assets/scripts_to_compile -name '*.js'`
allfiles=""
for i in $files;
do
  allfiles="$allfiles --js=$i"
done
echo "Closure JavaScript compiler:"
java -jar lib/closure_compiler.jar --js=app/assets/jquery.js $allfiles --js_output_file=$theme_dir/scripts/compiled.min.js --warning_level QUIET --summary_detail_level 3

echo "$(date) - Watcher has compiled theme"