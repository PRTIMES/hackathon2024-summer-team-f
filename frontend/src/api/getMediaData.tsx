import { MediaRequest, MediaResponseArray } from "@/types/media";

export const getMediaData = async (post: MediaRequest) => {
  const res = await fetch("http://localhost:8100/api/test", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify({ post }),
  });

  const data: MediaResponseArray = await res.json();
};
