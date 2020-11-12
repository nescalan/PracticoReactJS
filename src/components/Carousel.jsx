import React, { Children } from 'react';

const Carousel = ({Children}) => (

  <section class="carousel">

    <div class="carousel__container">
        {Children}
    </div>
  </section>


)

export default Carousel;