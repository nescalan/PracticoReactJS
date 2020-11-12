import React from 'react';
import Header from '../components/Header';
import Search from '../components/Search';
import '../assets/styles/App.scss';
import Categories from '../components/Categories';
import CarouselItem from '../components/CarouselItem';
import Carousel from '../components/Carousel';

const App = () => (
    <div className="App">
        <Header />
        <Search />

        <Categories>
            <Carousel>
                <CarouselItem />
            </Carousel>
        </Categories>
    </div>
);

export default App;