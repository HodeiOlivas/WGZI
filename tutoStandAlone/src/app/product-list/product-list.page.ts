import { Component, OnInit, inject } from '@angular/core';
import { CommonModule } from '@angular/common';
import { FormsModule } from '@angular/forms';
import { IonicModule } from '@ionic/angular';
import { ProductsService } from '../services/products.service';
import { Product } from '../classes/product';
import { NavController } from '@ionic/angular';
import { Router } from '@angular/router';

@Component({
  selector: 'app-product-list',
  templateUrl: './product-list.page.html',
  styleUrls: ['./product-list.page.scss'],
  standalone: true,
  imports: [IonicModule, CommonModule, FormsModule]
})
export class ProductListPage implements OnInit {

  products: Product [] = [];
  filteredProducts: Product[] = [];
  filterCategory: string = '';
  categories: string[] = [];

  productsService = inject(ProductsService);
 
  constructor(private router: Router) {}

  async ngOnInit() {
    const response = await this.productsService.getAll();
    this.products = response.results;
    this.filteredProducts = [...this.products];
    this.categories = this.getUniqueCategories();
  }

  showProductDetails(productId: string) {
    // Redirige a la página de detalles del producto y pasa el ID del producto como parámetro de ruta
    this.router.navigate(['/product-detail', productId]);
  }

  applyFilter() {
    if (this.filterCategory.trim() === '') {
      this.filteredProducts = [...this.products]; // Si no hay filtro, mostrar todos los productos
    } else {
      this.filteredProducts = this.products.filter(product => product.category === this.filterCategory); // Filtrar por categoría
    }
  }

  getUniqueCategories(): string[] {
    const uniqueCategories: string[] = [];
    this.products.forEach(product => {
      if (!uniqueCategories.includes(product.category)) {
        uniqueCategories.push(product.category);
      }
    });
    return uniqueCategories;
  }

}
