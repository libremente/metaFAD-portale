<?php
org_glizycms_Glizycms::init();

glz_loadLocale('museoweb.*');
glz_loadLocale('metafad.*');

metafad_modules_collections_Module::registerModule();
metafad_modules_institutesManagement_Module::registerModule();
museoweb_modules_ecommerce_Module::registerModule();
metafad_modules_dam_Module::registerModule();

org_glizy_ObjectFactory::remapClass('org.glizy.models.User', 'metafad.users.models.User');
org_glizy_ObjectFactory::remapClass('org.glizy.models.UserGroup', 'metafad.users.models.UserGroup');
org_glizy_ObjectFactory::remapClass('org.glizycms.userManager.models.User', 'metafad.users.models.User');
org_glizy_ObjectFactory::remapClass('org.glizycms.groupManager.models.UserGroup', 'metafad.users.models.UserGroup');
