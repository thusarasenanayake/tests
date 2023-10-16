import { useState, useEffect, useRef } from "react";

function App() {
  const [inputValue, setInputValue] = useState("");
  const previousInputValue = useRef("");
  
  useEffect(() => {
    console.log('effected');
    previousInputValue.current = inputValue;
  }, [inputValue]);
  
  console.log('rendered');
  return (
    <>
      <input
        type="text"
        value={inputValue}
        onChange={(e) => setInputValue(e.target.value)}
      />
      <h2>Current Value: {inputValue}</h2>
      <h2>Previous Value: {previousInputValue.current}</h2>
    </>
  );
}

export default App