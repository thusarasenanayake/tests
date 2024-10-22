import { useState } from "react";
import "./App.css";
import { useQuery } from "@tanstack/react-query";
import countries from "./assets/countries.json";
import cities from "./assets/cities.json";

type Country = {
  id: number;
  name: string;
};

type City = {
  id: number;
  countryId: number;
  name: string;
};

function getCountries(): Promise<Country[]> {
  return new Promise((resolve) => setTimeout(() => resolve(countries), 2000));
}

function getCities(countryId: number): Promise<City[]> {
  return new Promise((resolve) =>
    setTimeout(() => {
      const filteredCities = cities.filter(
        (city) => city.countryId === countryId
      );
      resolve(filteredCities);
    }, 2000)
  );
}

function App() {
  const [selectedCountry, setSelectedCountry] = useState<number>(0);

  const countriesQuery = useQuery<Country[], Error>({
    queryKey: ["countries", "index"],
    queryFn: getCountries,
  });

  const citiesQuery1 = useQuery<City[], Error>({
    queryKey: ["cities1", "index", { countryId: selectedCountry }],
    queryFn: () => getCities(selectedCountry),
  });

  const citiesQuery2 = useQuery<City[], Error>({
    queryKey: ["cities2", "index", { countryId: selectedCountry }],
    queryFn: () => getCities(selectedCountry),
    enabled: Boolean(selectedCountry),
  });

  function sayHi() {
    alert("Hi");
  }

  return (
    <>
      <button onClick={sayHi}>Say Hi</button>
      <br />
      <br />
      <select
        name=""
        id=""
        onChange={(eve) => setSelectedCountry(+eve.target.value)}
      >
        <option value="1">Sri Lanka</option>
        <option value="2">USA</option>
        <option value="3">UK</option>
      </select>

      <pre>{JSON.stringify(citiesQuery1.data)}</pre>

      <br />
      <hr />
      <br />

      <div>
        <p>countries query: {countriesQuery.status}</p>
        <p>cities query2: {citiesQuery2.status}</p>
      </div>

      <div>
        <pre>countries: {JSON.stringify(countriesQuery.data, null, 0)}</pre>
        <pre>cities: {JSON.stringify(citiesQuery2.data, null, 0)}</pre>
      </div>

      {countriesQuery.isLoading && "..."}

      {countriesQuery.isSuccess && (
        <select
          name=""
          id=""
          onChange={(eve) => setSelectedCountry(+eve.target.value)}
        >
          <option key="" value="0">
            choose...
          </option>
          {countriesQuery.data?.map((country) => (
            <option key={country.id} value={country.id}>
              {country.name}
            </option>
          ))}
        </select>
      )}

      {citiesQuery2.isLoading && "..."}
      {citiesQuery2.isSuccess && (
        <select name="" id="">
          <option key="" value="">
            choose...
          </option>
          {citiesQuery2.data?.map((city) => (
            <option key={city.id} value={city.id}>
              {city.name}
            </option>
          ))}
        </select>
      )}
    </>
  );
}

export default App;
