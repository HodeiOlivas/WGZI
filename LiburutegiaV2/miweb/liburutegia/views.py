from django.shortcuts import render
from .models import Liburua, Autoreak
from django.http import HttpResponseRedirect
from django.urls import reverse
def index (request):
    liburuak = Liburua.objects.all
    return render(request,'index.html', {'liburua':liburuak})
def add(request):
    autoreak = Autoreak.objects.all()
    return render(request, 'add.html', {'autoreak': autoreak})

def add_liburua(request):
    iz = request.POST["izenburua"]
    lb = request.POST["laburpena"]
    at_id = request.POST["autorea"]  # Obtenemos el ID del autor seleccionado
    autorea = Autoreak.objects.get(id=at_id)  # Obtenemos el autor a partir del ID
    liburuberria = Liburua(izenburua=iz, laburpena=lb, autorea=autorea)
    liburuberria.save()
    return HttpResponseRedirect(reverse('index'))

def ezabatu_liburua(request, liburu_id):
    liburua = Liburua.objects.get(pk=liburu_id)
    liburua.delete()
    return HttpResponseRedirect(reverse('index'))


def add_autoreak(request):
    if request.method == 'POST':
        izena = request.POST.get('izena')
        nanZenbakia = request.POST.get('nanZenbakia')
        jaiotzaData = request.POST.get('jaiotzaData')

        # Crea un nuevo autor y guárdalo en la base de datos
        autore_berria = Autoreak(izena=izena, nanZenbakia=nanZenbakia, jaiotzaData=jaiotzaData)
        autore_berria.save()

        return HttpResponseRedirect(reverse('index'))  # Redirecciona a la página principal después de agregar el autor

    return render(request, 'add_autore.html')

def ezabatu_autore(request, autore_id):
    autore = Autoreak.objects.get(pk=autore_id)
    autore.delete()
    return HttpResponseRedirect(reverse('add_autore'))

def add_autore(request):
    autoreak = Autoreak.objects.all()
    return render(request, 'add_autore.html', {'autoreak': autoreak})