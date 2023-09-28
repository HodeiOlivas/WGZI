from django.db import models
from django.contrib.auth.models import User

class Autoreak(models.Model):
    izena = models.CharField(max_length=100)
    nanZenbakia = models.CharField(max_length=100)
    jaiotzaData = models.DateTimeField(auto_now_add=True)

    def __unicode__(self):
        return self.izena

class Liburua(models.Model):
    izenburua = models.CharField(max_length=100)
    laburpena = models.CharField(max_length=100)
    noizSortua = models.DateTimeField(auto_now_add=True)
    # Agregar ForeignKey para relacionar con Autoreak
    autorea = models.ForeignKey(Autoreak, on_delete=models.CASCADE)

    def __unicode__(self):
        return self.izenburua
