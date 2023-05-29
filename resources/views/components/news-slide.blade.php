<h2 class="font-bold text-primary-500 mb-4">Berita</h2>
            <section class="flex card h-5/6 rounded-md shadow-lg">
                <img 
                    src="{{ asset('https://placekitten.com/1200/1200') }}" 
                    alt="image-news"
                    class="basis-1/3 aspect-[2/3] object-cover w-1/3"
                    id="news-image">
                <span class="basis-2/3 flex flex-col justify-center px-12 relative">
                    <section class="h-3/5 mb-12">
                        <h1
                            class="text-3xl font-bold mb-4 line-clamp-2"
                            id="news-title">
                            Lorem Ipsum Dolor
                        </h1>
                        <p 
                            id="news-content"
                            class="line-clamp-6 2xl:line-clamp-[8]"
                            >Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor Lorem Ipsum Dolor
                        </p>
                    </section>
                    <section class="self-end mt-4 absolute right-8 bottom-8">
                        <button class="btn-primary" id="prev-button" onclick="slideHandler(-1)"><</button>
                        <button class="btn-primary" id="next-button" onclick="slideHandler(1)">></button>
                    </section>
                </span>
            </section>
<script >
    let data = @json($news);
    let max = data.length
    let index = 0;
    let image = document.getElementById("news-image");
    let title = document.getElementById("news-title");
    let content = document.getElementById("news-content");
    let prev = document.getElementById("prev-button");
    let next = document.getElementById("next-button");

    const checkButton = () => {
        prev.disabled = index == 0;
        next.disabled = index == max - 1;
    }

    const setSlide = (idx) => {
        image.src = `/data_file/${data[idx].image}`
        title.innerText = data[idx].title;
        content.innerText = data[idx].content;
    }

    const slideHandler = (i) => {
        if(index + i >= 0 && index + i < max){
            index = index + i;
            setSlide(index);
            checkButton();
        }
    }
    
    checkButton();
    setSlide(index);
</script>