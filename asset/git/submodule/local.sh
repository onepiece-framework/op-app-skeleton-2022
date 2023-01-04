
# Copy backup.
cp .gitmodules .gitmodules_original

# --> sudo port install realpath
HOME=$(realpath ~/)

# Replace
sed -i -e "s|https://github.com/onepiece-framework/|${HOME}/repo/op/|g" .gitmodules
sed -i -e "s|/unit-|/unit/|g"          .gitmodules # old path, Retained for compatibility.
sed -i -e "s|/module-|/module/|g"      .gitmodules # old path, Retained for compatibility.
sed -i -e "s|/layout-|/layout/|g"      .gitmodules # old path, Retained for compatibility.
sed -i -e "s|/op-core.git|/core.git|g" .gitmodules
sed -i -e "s|/op-unit-|/unit/|g"       .gitmodules
sed -i -e "s|/op-module-|/module/|g"   .gitmodules
sed -i -e "s|/op-layout-|/layout/|g"   .gitmodules
sed -i -e "s|/op-webpack-|/webpack/|g" .gitmodules

# Sync
git submodule sync

# Delete garbage files.
if [[ -e '.gitmodules-e' ]];then
  rm .gitmodules-e
fi
