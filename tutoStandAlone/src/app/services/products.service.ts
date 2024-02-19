import { Injectable } from '@angular/core';
import { HttpClient } from '@angular/common/http';
import { firstValueFrom } from 'rxjs';
import { Product } from '../classes/product';

@Injectable({
  providedIn: 'root'
})
export class ProductsService {

  constructor(private httpClient: HttpClient) {}

  getAll(): Promise<any> {
    const jsonUrl = 'assets/productos.json';

    return firstValueFrom(
      this.httpClient.get<Product[]>(jsonUrl)
    );
  }
  getProductById(productId: string): Promise<Product> {
    const jsonUrl = 'assets/productos.json';

    return this.httpClient.get<any>(jsonUrl).toPromise()
      .then(response => {
        const product = response.results.find((item: Product) => item._id === productId);
        if (product) {
          return product;
        } else {
          throw new Error('Product not found');
        }
      });
  }
}
