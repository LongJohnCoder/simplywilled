import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { MyGiftTextComponent } from './my-gift-text.component';

describe('MyGiftTextComponent', () => {
  let component: MyGiftTextComponent;
  let fixture: ComponentFixture<MyGiftTextComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ MyGiftTextComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(MyGiftTextComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
