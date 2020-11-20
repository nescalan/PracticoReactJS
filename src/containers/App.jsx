import React, { useState, useEffect } from "react";
import Header from "../components/Header";
import Search from "../components/Search";
import Categories from "../components/Categories";
import CarouselItem from "../components/CarouselItem";
import Carousel from "../components/Carousel";
import Footer from "../components/Footer";

import "../assets/styles/App.scss";

const App = () => {
  //   const [videos, setVideos] = useState([]);
  const [videos, setVideos] = useState({
    mylist: [],
    trends: [],
    originals: [],
  });

  useEffect(() => {
    fetch("http://localhost:3000/initalState")
      .then((response) => response.json())
      .then((data) => setVideos(data));
  }, []);

  //   console.log(videos);

  return (
    <div className="App">
      <Header />
      <Search />

      {videos.mylist.lenth > 0 && (
        <Categories title="Mi Lista">
          <Carousel>
            <CarouselItem />
          </Carousel>
        </Categories>
      )}

      <Categories title="Tendencias">
        <Carousel>
          {videos.trends.map((item) => (
            <CarouselItem key={item.id} {...item} />
          ))}
        </Carousel>
      </Categories>

      <Categories title="Originales de Platzi Video">
        <Carousel>
          <CarouselItem />
        </Carousel>
      </Categories>

      <Footer />
    </div>
  );
};

export default App;
