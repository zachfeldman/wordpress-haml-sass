theme_dir="theme"
temp_dir="tmp"

php lib/MtHaml/compile.php "/../../$theme_dir/"
sass app/assets/stylesheets/compiled.sass:$theme_dir/compiled.css
cp app/assets/stylesheets/style.css $theme_dir/style.css
cp -R app/assets/images $theme_dir
cp -R app/assets/scripts_uncompiled/ $theme_dir/scripts

coffeefiles=`find app/assets/scripts_to_compile -name '*.coffee'`
for j in $coffeefiles;
do
  coffee -c -b -o $temp_dir $j
done

files=`find app/assets/scripts_to_compile $temp_dir -name '*.js'`
allfiles=""
for i in $files;
do
  allfiles="$allfiles --js=$i"
done
echo "Closure JavaScript compiler:"
java -jar lib/closure_compiler.jar --js=app/assets/jquery.js $allfiles --js_output_file=$theme_dir/scripts/compiled.min.js --warning_level QUIET --summary_detail_level 3

rm $temp_dir/*.js
echo "$(date) - Watcher has compiled theme"