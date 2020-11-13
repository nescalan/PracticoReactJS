import React, { Children } from 'react';
import '../assets/styles/components/Carousel.scss';

const Carousel = ({Children}) => (

  <section class="carousel">

    <div class="carousel__container">
        {Children}
    </div>
  </section>


)

export default Carousel;