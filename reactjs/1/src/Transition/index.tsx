import { ChangeEvent, useEffect, useState, useTransition } from "react";

export default function App() {
  const [isPending, startTransition] = useTransition();
  const [num, setNum] = useState(0);
  const [multiples, setMultiples] = useState([] as JSX.Element[]);

  function generateMultiples(num: number) {
    startTransition(() => {
      setMultiples(
        Array.from(Array(10000).keys()).map((i) => (
          <div key={i} className={"m-0 p-0 col-1"}>
            {num * (i + 1)}
          </div>
        ))
      );
    });
  }

  useEffect(() => {
    if (num > 0) {
      generateMultiples(num);
    }
  }, [num]);

  const onChange = (e: ChangeEvent<HTMLInputElement>) => {
    setNum(Number(e.target.value));
  };

  return (
    <main className="container my-5">
      <input type="text" name="num" id="num" value={num} onChange={onChange} />
      <span className="ms-5 mt-3 h3">100,000 multiples of number: {num}</span>
      <div className="multiples row mt-5">
        {isPending ? "Loading..." : multiples}
      </div>
    </main>
  );
}