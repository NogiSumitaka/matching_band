<x-app-layout>
    <!--Talk -->
    <div>
        <div>
            <div>
                <div>
                    <p>icon</p>
                    <p>こんにちは！</p>
                </div>
                
            </div>
            
            <div>
                <form type="POST" action="/profile/message">
                    @csrf
                    <input type="text" name="message"/>
                    <input type="submit" value="送信"/>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>