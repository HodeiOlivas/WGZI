export class Product {
    _id: string;
    name: string;
    description: string;
    price: number;
    category: string;
    image: string;
    active: boolean;
  
    constructor(
      _id: string,
      name: string,
      description: string,
      price: number,
      category: string,
      image: string,
      active: boolean
    ) {
      this._id = _id;
      this.name = name;
      this.description = description;
      this.price = price;
      this.category = category;
      this.image = image;
      this.active = active;
    }
  }
  