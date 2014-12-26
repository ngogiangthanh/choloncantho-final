# opencart theme: gomarket

# clean up
rm -rf gomarket-full-package gomarket-full-package.zip gomarket-theme-package gomarket-theme-package.zip

# export code from local repository
svn --ignore-externals export ../ gomarket-full-package/ --username lam.le

# copy database files
cat gomarket-full-package/db/1_schema.sql gomarket-full-package/db/2_init_data.sql gomarket-full-package/db/3_update_config.sql > sample-database.sql

# create gomarket-full-package.zip
zip -rq gomarket-full-package.zip gomarket-full-package/ sample-database.sql
echo "Created gomarket-full-package.zip"

# create gomarket-theme-package.zip
mkdir gomarket-theme-package \
	gomarket-theme-package/upload \
	gomarket-theme-package/extensions \
	gomarket-theme-package/upload/admin \
	gomarket-theme-package/upload/admin/controller \
	gomarket-theme-package/upload/admin/controller/module \
	gomarket-theme-package/upload/admin/view \
	gomarket-theme-package/upload/admin/view/image \
	gomarket-theme-package/upload/admin/view/template \
	gomarket-theme-package/upload/admin/view/template/module \
	gomarket-theme-package/upload/admin/language \
	gomarket-theme-package/upload/admin/language/english \
	gomarket-theme-package/upload/admin/language/english/module \
	gomarket-theme-package/upload/catalog \
	gomarket-theme-package/upload/catalog/controller \
	gomarket-theme-package/upload/catalog/controller/module \
	gomarket-theme-package/upload/catalog/language \
	gomarket-theme-package/upload/catalog/language/english \
	gomarket-theme-package/upload/catalog/language/english/module \
	gomarket-theme-package/upload/catalog/model \
	gomarket-theme-package/upload/catalog/model/catalog \
	gomarket-theme-package/upload/catalog/view \
	gomarket-theme-package/upload/catalog/view/theme \
	gomarket-theme-package/upload/catalog/view/javascript \
	gomarket-theme-package/upload/catalog/view/javascript/jquery \
	gomarket-theme-package/upload/catalog/view/theme/default \
	gomarket-theme-package/upload/catalog/view/theme/default/template \
	gomarket-theme-package/upload/catalog/view/theme/default/template/module \
	gomarket-theme-package/upload/catalog/view/theme/default/stylesheet \
	gomarket-theme-package/upload/catalog/view/theme/default/image \
	gomarket-theme-package/upload/image \
	gomarket-theme-package/upload/image/data \
	gomarket-theme-package/upload/image/templates \
	gomarket-theme-package/upload/vqmod \
	gomarket-theme-package/upload/vqmod/xml

# gomarket-theme-package/upload/admin/controller/module/
cp gomarket-full-package/admin/controller/module/boss_alphabet.php  gomarket-theme-package/upload/admin/controller/module
cp gomarket-full-package/admin/controller/module/boss_carousel.php  gomarket-theme-package/upload/admin/controller/module
cp gomarket-full-package/admin/controller/module/boss_columnfilter.php  gomarket-theme-package/upload/admin/controller/module
cp gomarket-full-package/admin/controller/module/boss_featured.php  gomarket-theme-package/upload/admin/controller/module
cp gomarket-full-package/admin/controller/module/boss_homecategory_column.php  gomarket-theme-package/upload/admin/controller/module
cp gomarket-full-package/admin/controller/module/boss_homecategory_nonetab.php  gomarket-theme-package/upload/admin/controller/module
cp gomarket-full-package/admin/controller/module/boss_homecategory_tab.php  gomarket-theme-package/upload/admin/controller/module
cp gomarket-full-package/admin/controller/module/boss_latest.php  gomarket-theme-package/upload/admin/controller/module
cp gomarket-full-package/admin/controller/module/boss_megamenu.php  gomarket-theme-package/upload/admin/controller/module
cp gomarket-full-package/admin/controller/module/boss_quickselect.php  gomarket-theme-package/upload/admin/controller/module
cp gomarket-full-package/admin/controller/module/boss_slideshow.php  gomarket-theme-package/upload/admin/controller/module
cp gomarket-full-package/admin/controller/module/boss_staticblock.php  gomarket-theme-package/upload/admin/controller/module
cp gomarket-full-package/admin/controller/module/boss_zoom.php  gomarket-theme-package/upload/admin/controller/module
cp gomarket-full-package/admin/controller/module/manufacturer.php  gomarket-theme-package/upload/admin/controller/module
cp gomarket-full-package/admin/controller/module/tagcloud.php  gomarket-theme-package/upload/admin/controller/module

# gomarket-theme-package/upload/admin/language/english/module
cp gomarket-full-package/admin/language/english/module/boss_alphabet.php  gomarket-theme-package/upload/admin/language/english/module
cp gomarket-full-package/admin/language/english/module/boss_carousel.php  gomarket-theme-package/upload/admin/language/english/module
cp gomarket-full-package/admin/language/english/module/boss_columnfilter.php  gomarket-theme-package/upload/admin/language/english/module
cp gomarket-full-package/admin/language/english/module/boss_featured.php  gomarket-theme-package/upload/admin/language/english/module
cp gomarket-full-package/admin/language/english/module/boss_homecategory_column.php  gomarket-theme-package/upload/admin/language/english/module
cp gomarket-full-package/admin/language/english/module/boss_homecategory_nonetab.php  gomarket-theme-package/upload/admin/language/english/module
cp gomarket-full-package/admin/language/english/module/boss_homecategory_tab.php  gomarket-theme-package/upload/admin/language/english/module
cp gomarket-full-package/admin/language/english/module/boss_latest.php  gomarket-theme-package/upload/admin/language/english/module
cp gomarket-full-package/admin/language/english/module/boss_megamenu.php  gomarket-theme-package/upload/admin/language/english/module
cp gomarket-full-package/admin/language/english/module/boss_quickselect.php  gomarket-theme-package/upload/admin/language/english/module
cp gomarket-full-package/admin/language/english/module/boss_slideshow.php  gomarket-theme-package/upload/admin/language/english/module
cp gomarket-full-package/admin/language/english/module/boss_staticblock.php  gomarket-theme-package/upload/admin/language/english/module
cp gomarket-full-package/admin/language/english/module/boss_zoom.php  gomarket-theme-package/upload/admin/language/english/module
cp gomarket-full-package/admin/language/english/module/manufacturer.php  gomarket-theme-package/upload/admin/language/english/module
cp gomarket-full-package/admin/language/english/module/tagcloud.php  gomarket-theme-package/upload/admin/language/english/module

# gomarket-theme-package/upload/admin/view/image
cp gomarket-full-package/admin/view/image/valid-xhtml10-blue.png gomarket-theme-package/upload/admin/view/image

# gomarket-theme-package/upload/admin/view/image
cp -r gomarket-full-package/admin/view/image/boss_zoom gomarket-theme-package/upload/admin/view/image
	
# gomarket-theme-package/upload/admin/view/template/module
cp gomarket-full-package/admin/view/template/module/boss_alphabet.tpl  gomarket-theme-package/upload/admin/view/template/module
cp gomarket-full-package/admin/view/template/module/boss_carousel.tpl  gomarket-theme-package/upload/admin/view/template/module
cp gomarket-full-package/admin/view/template/module/boss_columnfilter.tpl  gomarket-theme-package/upload/admin/view/template/module
cp gomarket-full-package/admin/view/template/module/boss_featured.tpl  gomarket-theme-package/upload/admin/view/template/module
cp gomarket-full-package/admin/view/template/module/boss_homecategory_column.tpl  gomarket-theme-package/upload/admin/view/template/module
cp gomarket-full-package/admin/view/template/module/boss_homecategory_nonetab.tpl  gomarket-theme-package/upload/admin/view/template/module
cp gomarket-full-package/admin/view/template/module/boss_homecategory_tab.tpl  gomarket-theme-package/upload/admin/view/template/module
cp gomarket-full-package/admin/view/template/module/boss_latest.tpl  gomarket-theme-package/upload/admin/view/template/module
cp gomarket-full-package/admin/view/template/module/boss_megamenu.tpl  gomarket-theme-package/upload/admin/view/template/module
cp gomarket-full-package/admin/view/template/module/boss_quickselect.tpl  gomarket-theme-package/upload/admin/view/template/module
cp gomarket-full-package/admin/view/template/module/boss_slideshow.tpl  gomarket-theme-package/upload/admin/view/template/module
cp gomarket-full-package/admin/view/template/module/boss_staticblock.tpl  gomarket-theme-package/upload/admin/view/template/module
cp gomarket-full-package/admin/view/template/module/boss_zoom.tpl  gomarket-theme-package/upload/admin/view/template/module
cp gomarket-full-package/admin/view/template/module/manufacturer.tpl  gomarket-theme-package/upload/admin/view/template/module
cp gomarket-full-package/admin/view/template/module/tagcloud.tpl  gomarket-theme-package/upload/admin/view/template/module

# gomarket-theme-package/upload/catalog/controller
cp -r gomarket-full-package/catalog/controller/bossthemes gomarket-theme-package/upload/catalog/controller

# gomarket-theme-package/upload/catalog/controller/module
cp gomarket-full-package/catalog/controller/module/boss_alphabet.php gomarket-theme-package/upload/catalog/controller/module
cp gomarket-full-package/catalog/controller/module/boss_carousel.php gomarket-theme-package/upload/catalog/controller/module
cp gomarket-full-package/catalog/controller/module/boss_columnfilter.php gomarket-theme-package/upload/catalog/controller/module
cp gomarket-full-package/catalog/controller/module/boss_featured.php gomarket-theme-package/upload/catalog/controller/module
cp gomarket-full-package/catalog/controller/module/boss_homecategory_column.php gomarket-theme-package/upload/catalog/controller/module
cp gomarket-full-package/catalog/controller/module/boss_homecategory_nonetab.php gomarket-theme-package/upload/catalog/controller/module
cp gomarket-full-package/catalog/controller/module/boss_homecategory_tab.php gomarket-theme-package/upload/catalog/controller/module
cp gomarket-full-package/catalog/controller/module/boss_latest.php gomarket-theme-package/upload/catalog/controller/module
cp gomarket-full-package/catalog/controller/module/boss_megamenu.php gomarket-theme-package/upload/catalog/controller/module
cp gomarket-full-package/catalog/controller/module/boss_quickselect.php gomarket-theme-package/upload/catalog/controller/module
cp gomarket-full-package/catalog/controller/module/boss_search.php gomarket-theme-package/upload/catalog/controller/module
cp gomarket-full-package/catalog/controller/module/boss_slideshow.php gomarket-theme-package/upload/catalog/controller/module
cp gomarket-full-package/catalog/controller/module/boss_staticblock.php gomarket-theme-package/upload/catalog/controller/module
cp gomarket-full-package/catalog/controller/module/boss_zoom.php gomarket-theme-package/upload/catalog/controller/module
cp gomarket-full-package/catalog/controller/module/manufacturer.php gomarket-theme-package/upload/catalog/controller/module
cp gomarket-full-package/catalog/controller/module/tagcloud.php gomarket-theme-package/upload/catalog/controller/module

# gomarket-theme-package/upload/catalog/language/english
cp -r gomarket-full-package/catalog/language/english/bossthemes gomarket-theme-package/upload/catalog/language/english

# gomarket-theme-package/upload/catalog/language/english/module
cp gomarket-full-package/catalog/language/english/module/boss_alphabet.php gomarket-theme-package/upload/catalog/language/english/module
cp gomarket-full-package/catalog/language/english/module/boss_columnfilter.php gomarket-theme-package/upload/catalog/language/english/module
cp gomarket-full-package/catalog/language/english/module/boss_featured.php gomarket-theme-package/upload/catalog/language/english/module
cp gomarket-full-package/catalog/language/english/module/boss_latest.php gomarket-theme-package/upload/catalog/language/english/module
cp gomarket-full-package/catalog/language/english/module/boss_search.php gomarket-theme-package/upload/catalog/language/english/module
cp gomarket-full-package/catalog/language/english/module/manufacturer.php gomarket-theme-package/upload/catalog/language/english/module
cp gomarket-full-package/catalog/language/english/module/tagcloud.php gomarket-theme-package/upload/catalog/language/english/module

# gomarket-theme-package/upload/catalog/model/catalog
cp gomarket-full-package/catalog/model/catalog/tagcloud.php gomarket-theme-package/upload/catalog/model/catalog

# gomarket-theme-package/upload/catalog/view/javascript
cp -r gomarket-full-package/catalog/view/javascript/bossthemes gomarket-theme-package/upload/catalog/view/javascript

# gomarket-theme-package/upload/catalog/view/javascript/jquery
cp -r gomarket-full-package/catalog/view/javascript/jquery/cloud-zoom gomarket-theme-package/upload/catalog/view/javascript/jquery


# cosmetics-theme-package/upload/catalog/view/theme/default/image
cp gomarket-full-package/catalog/view/theme/default/image/cloud.png gomarket-theme-package/upload/catalog/view/theme/default/image

# gomarket-theme-package/upload/catalog/view/theme/default/stylesheet
cp gomarket-full-package/catalog/view/theme/default/stylesheet/boss_alphabet.css gomarket-theme-package/upload/catalog/view/theme/default/stylesheet
cp gomarket-full-package/catalog/view/theme/default/stylesheet/boss_carousel.css gomarket-theme-package/upload/catalog/view/theme/default/stylesheet
cp gomarket-full-package/catalog/view/theme/default/stylesheet/camera.css gomarket-theme-package/upload/catalog/view/theme/default/stylesheet
cp gomarket-full-package/catalog/view/theme/default/stylesheet/cloud-zoom.1.0.3.css gomarket-theme-package/upload/catalog/view/theme/default/stylesheet

# gomarket-theme-package/upload/catalog/view/theme/default/template/
cp -r gomarket-full-package/catalog/view/theme/default/template/bossthemes gomarket-theme-package/upload/catalog/view/theme/default/template

# gomarket-theme-package/upload/catalog/view/theme/default/template/module/
cp gomarket-full-package/catalog/view/theme/default/template/module/boss_alphabet.tpl gomarket-theme-package/upload/catalog/view/theme/default/template/module
cp gomarket-full-package/catalog/view/theme/default/template/module/boss_carousel.tpl gomarket-theme-package/upload/catalog/view/theme/default/template/module
cp gomarket-full-package/catalog/view/theme/default/template/module/boss_columnfilter.tpl gomarket-theme-package/upload/catalog/view/theme/default/template/module
cp gomarket-full-package/catalog/view/theme/default/template/module/boss_featured.tpl gomarket-theme-package/upload/catalog/view/theme/default/template/module
cp gomarket-full-package/catalog/view/theme/default/template/module/boss_homecategory_column.tpl gomarket-theme-package/upload/catalog/view/theme/default/template/module
cp gomarket-full-package/catalog/view/theme/default/template/module/boss_homecategory_nonetab.tpl gomarket-theme-package/upload/catalog/view/theme/default/template/module
cp gomarket-full-package/catalog/view/theme/default/template/module/boss_homecategory_tab.tpl gomarket-theme-package/upload/catalog/view/theme/default/template/module
cp gomarket-full-package/catalog/view/theme/default/template/module/boss_latest.tpl gomarket-theme-package/upload/catalog/view/theme/default/template/module
cp gomarket-full-package/catalog/view/theme/default/template/module/boss_megamenu.tpl gomarket-theme-package/upload/catalog/view/theme/default/template/module
cp gomarket-full-package/catalog/view/theme/default/template/module/boss_quickselect.tpl gomarket-theme-package/upload/catalog/view/theme/default/template/module
cp gomarket-full-package/catalog/view/theme/default/template/module/boss_search.tpl gomarket-theme-package/upload/catalog/view/theme/default/template/module
cp gomarket-full-package/catalog/view/theme/default/template/module/boss_slideshow.tpl gomarket-theme-package/upload/catalog/view/theme/default/template/module
cp gomarket-full-package/catalog/view/theme/default/template/module/boss_staticblock.tpl gomarket-theme-package/upload/catalog/view/theme/default/template/module
cp gomarket-full-package/catalog/view/theme/default/template/module/boss_zoom.tpl gomarket-theme-package/upload/catalog/view/theme/default/template/module
cp gomarket-full-package/catalog/view/theme/default/template/module/manufacturer.tpl gomarket-theme-package/upload/catalog/view/theme/default/template/module
cp gomarket-full-package/catalog/view/theme/default/template/module/tagcloud.tpl gomarket-theme-package/upload/catalog/view/theme/default/template/module

# gomarket-theme-package/upload/catalog/view/theme/gomarket
cp -r gomarket-full-package/catalog/view/theme/bt_gomarket gomarket-theme-package/upload/catalog/view/theme
	
# gomarket-theme-package/upload/image
cp -r gomarket-full-package/image/data/bt_gomarket gomarket-theme-package/upload/image/data
cp gomarket-full-package/image/templates/bt_gomarket.png  gomarket-theme-package/upload/image/templates

# gomarket-theme-package/upload/vqmod/xml
cp gomarket-full-package/vqmod/xml/boss_catalog_controller_common_header.xml gomarket-theme-package/upload/vqmod/xml
cp gomarket-full-package/vqmod/xml/boss_catalog_controller_common_footer.xml gomarket-theme-package/upload/vqmod/xml
cp gomarket-full-package/vqmod/xml/boss_catalog_controller_common_seo_url.xml gomarket-theme-package/upload/vqmod/xml
cp gomarket-full-package/vqmod/xml/boss_catalog_theme_default_common_header.xml gomarket-theme-package/upload/vqmod/xml

# file install

# create gomarket-theme-package.zip
zip -rq gomarket-theme-package.zip gomarket-theme-package
echo "Created gomarket-theme-package.zip"

#clean up
rm -Rf gomarket-theme-package
rm -Rf gomarket-full-package
rm -Rf sample-database.sql
