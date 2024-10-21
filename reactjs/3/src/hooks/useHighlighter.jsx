import { useEffect } from "react";

function useHighlighter(ref) {
  useEffect(() => {
    const elements = document.querySelectorAll(`[data-highlight="${ref}"]`);

    if (elements.length > 0) {
      elements.forEach((element) => {
        element.style.background = "yellow";
      });
    }
    return () => {
      if (elements.length > 0) {
        elements.forEach((element) => {
          element.style.background = ""; // Reset the color when the component unmounts
        });
      }
    };
  }, [ref]);
}

export default useHighlighter;
