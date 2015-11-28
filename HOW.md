#CAKE BAKE ADMIN

bin/cake bake model ModelNames --table table_name --theme TemplateAdmin
bin/cake bake controller ModelNames --theme TemplateAdmin
bin/cake bake template ModelNames --theme TemplateAdmin

#CAKE BAKE SITE

bin/cake bake model ModelNames --table table_name --theme TemplateSite
bin/cake bake controller ModelNames --theme TemplateSite
bin/cake bake template ModelNames --theme TemplateSite