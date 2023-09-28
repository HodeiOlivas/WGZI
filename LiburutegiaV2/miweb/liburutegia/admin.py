from django.contrib import admin
from .models import Liburua, Autoreak
# Register your models here.
class LiburuaAdmin(admin.ModelAdmin):

   list_display = ['izenburua','laburpena','noizSortua','autorea']

admin.site.register(Liburua)
admin.site.register(Autoreak)