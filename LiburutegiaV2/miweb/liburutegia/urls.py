from django.urls import path
from . import views
urlpatterns = [
    path('',views.index, name='index'),
    path('add/',views.add,name="add"),
    path('add/addpost/', views.add_liburua, name="addpost"),
    path('ezabatu_liburua/<int:liburu_id>/', views.ezabatu_liburua, name='ezabatu_liburua'),
    path('add_autoreak/', views.add_autoreak, name='add_autoreak'),
    path('add_autore/', views.add_autore, name='add_autore'),
    path('ezabatu_autore/<int:autore_id>/', views.ezabatu_autore, name='ezabatu_autore'),
]